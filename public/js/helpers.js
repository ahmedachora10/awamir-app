var request_headers = {
    'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').getAttribute('content')
};


/**
 * 
 * @param {String} pFromClass class that you want removed
 * @param {String} pToClass class that you want added
 * @returns jQuery
 */
$.fn.replaceClass = function (pFromClass, pToClass) {
    return this.removeClass(pFromClass).addClass(pToClass);
};

function filePond(element, options = {}) {

    if(!FilePond) {
        return console.error('There is no FilePond Fount');
    }

    const pond_thumbnails = FilePond.create(element, {
        allowImagePreview: true,
        credits: false,
        ...options
    });

    return {
        setOptions: (url) => {
            pond_thumbnails.setOptions({
                server: {
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').getAttribute('content')
                    }
                },
                maxFiles: 1,
                allowMultiple: false,
            });
        },

        preview: function (fullpath_image, image_name = '', name = 'image') {
            pond_thumbnails.addFile(fullpath_image);
            this.addInputImage(image_name, name);
        },

        addInputImage: (image_name, name) => {
            return document.addEventListener('FilePond:init', (e) => {
                const input_field = Array.from(document.querySelectorAll('[name=' + name + ']'))[1];
                input_field.value =  image_name;
            });

        }
    }
}


/**
 * @method ajax
 * @description Make Ajax Request
 * @param {String} $url
 * @param {String} $method
 * @param {Object} $data
 * @return {Promise}
 */

function ajax({url, method, data}) {
    return $.ajax({
        url: url,
        method: method,
        headers: {
            ...request_headers
        },
        dataType: 'json',
        data
    });
}


/**
 * @method add_options_to_select_box 
 * @description Add An Option To Select Box
 * @param {Array} collaction
 * @param {HTMLSelectElement} container
 * @param {String} default_option
 * @return {null}
 */
 const add_options_to_select_box = (collaction /* data */, container /* 'select' element */, default_option = '') => {
    let options = default_option;
    collaction.forEach(level => {
        options += `<option value="${level.id}">${level.name}</option>`;
    });

    container.html(options);
}


/**
 * 
 * @param {HTMLElement} target list of elements
 * @param {Closure} handler handling data
 * @returns Sortable Object
 */
const sortable = (/**List*/ target, handler = null) => {
    const sortable_options = {
        swap: true,
        swapClass: 'highlight',
        animation: 150,

        onEnd: function( /**Event*/ evt) {
            var itemEl = evt.item;

            const old = evt.oldIndex;
            const current = evt.newIndex;
            const tr = target.find('tr');

            // if rows has same values
            if(tr.attr('data-id') === undefined) return console.error('Please make sure you have data-id of element tr');
            
            if(old === current) return false;
            
            if(typeof handler == 'function') return handler();
            
            if(typeof handler != 'object') return console.error('Please Enter a Handler as a Function or Object!');

            const {url, method, response, error} = handler;


            ajax({
                url: url,
                method: method || 'POST',
                data: {
                    old_place: $(tr[old]).attr('data-id'),
                    current_place: $(tr[current]).attr('data-id'),
                },
                dataType: 'json'
            }).done(res => response(res))
            .catch(err => error(err));

        }
    };

    if(!target.length) {
        return console.error('target element is null');
    }

    if (typeof Sortable == "undefined") return console.error('There is no Sortable Object Fount');

    return target.sortable(sortable_options);
}
