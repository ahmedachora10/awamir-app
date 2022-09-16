<x-app-layout>

    <x-admin.headline title="وظيفة جديدة" icon="folder-google-drive"/>

    <x-admin.card-table method="POST" action="{{ route('jobs.store') }}">

        <div class="row" dir="rtl">

            <div class="form-group col-12">
                <x-admin.input  type="file" id="image" name="image"  />
                <x-admin.error field="image" />
            </div>


            <div class="col-md-6 form-group">
                <x-admin.input type="text" id="name" name="name" :value="old('name')" placeholder="{{ __('العنوان') }}" />
                <x-admin.error field="name" />
            </div>

            <div class="col-md-6 form-group">
                <x-admin.input type="text" id="company" name="company" :value="old('company')" placeholder="{{ __('الشركة') }}" />
                <x-admin.error field="company" />
            </div>

            <div class="col-md-6 form-group">
                <x-admin.select-input name="country_id" id="country_id">
                    <option>  اختر الدولة </option>

                    @foreach ($countries as $country)
                    <option value="{{ $country->id }}"> {{ $country->name }} </option>
                    @endforeach

                </x-admin.select-input>
                <x-admin.error field="country_id" />
            </div><!-- End Countries -->

            <div class="col-md-6 form-group">
                <x-admin.select-input name="city_id" id="city_id">
                    <option>  اختر المدينة </option>

                </x-admin.select-input>
                <x-admin.error field="city_id" />
            </div><!-- End Cities -->

            <div class="col-md-6 form-group">
                <x-admin.select-input name="category_id" id="category_id">
                    <option>  اختر الفئة </option>

                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}"> {{ $category->name }} </option>
                    @endforeach

                </x-admin.select-input>
                <x-admin.error field="category_id" />
            </div><!-- End Categories -->

            <div class="col-md-6 form-group">
                <x-admin.select-input name="jobtype_id" id="jobtype_id">
                    <option>  اختر نوع الوظيفة </option>

                    @foreach ($jobTypes as $type)
                    <option value="{{ $type->id }}"> {{ $type->name }} </option>
                    @endforeach

                </x-admin.select-input>
                <x-admin.error field="jobtype_id" />
            </div><!-- End Job Types -->

            <div class="col-12 form-group">
                <textarea name="description" id="description" class="col-12"></textarea>
                <x-admin.error field="description" />
            </div>


            <div class="col-md-6 form-group">
                <x-admin.input type="text" id="source" name="source" :value="old('source')" placeholder="{{ __('المصدر') }}" />
                <x-admin.error field="source" />
            </div>

            <div class="col-md-6 form-group">
                <x-admin.input type="text" id="submission" name="submission" :value="old('submission')" placeholder="{{ __('رابط التقديم') }}" />
                <x-admin.error field="submission" />
            </div>

            <div class="col-md-6 form-group">
                <x-admin.input type="text" id="cv" name="cv" :value="old('cv')" placeholder="{{ __('طلب السيرة') }}" />
                <x-admin.error field="cv" />
            </div>

            <div class="col-md-6 form-group">
                <x-admin.select-input name="register_through_awamir" id="register_through_awamir">
                    <option> التسجيل عبر أوامر </option>
                    @foreach (json_decode(settings('register_through_awamir')) as $link)
                        <option value="{{ $link }}">{{ $link }}</option>
                    @endforeach

                </x-admin.select-input>
                <x-admin.error field="register_through_awamir" />
            </div><!-- End Categories -->

            <div class="col-md-4 form-group">
                <div class="d-flex align-items-center">
                    <input class="form-check-input" type="checkbox" id="whatsapp" name="whatsapp">
                    <label class="mb-0 fw-bold me-2">المشاركة في واتساب</label>
                </div>
            </div>


        </div>



        <button type="submit" class="btn btn-gradient-primary mb-2">{{ __('Save') }}</button>
    </x-admin.card-table>

    @push('styles')
        <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
    @endpush

    @push('scripts')
        <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        <script src="{{ asset('js/helpers.js') }}"></script>

        <script>

            const cities = {{ Illuminate\Support\Js::from($cities) }};
            const countries = $('#country_id');
            const citiesContainer = $('#city_id');
            const image = document.querySelector('input[id=image]');

            countries.change(function () {
                const id = $('#country_id option:selected').val();

                const countryCities = cities.filter(item => item.country_id == id);

                let content = '<option>اختر المدينة</option>';
                countryCities.forEach(city => {
                    content += `<option value="${city.id}">${city.name}</option>`;
                });

                citiesContainer.html(content);

            });

            tinymce.init({
                selector: '#description',
                // inline: true,
                plugins: [
                'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
                'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
                'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
                ],
                toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
                'alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
            });


            const my_file_bond = filePond(image,{
                required:true,
                labelIdle: ' سحب وافلات صورة   <span class="filepond--label-action text-primary"> تصفح </span>',
                labelFileLoadError: 'الصيغ المدعومة هي jpg,jpeg,svg,webp,png',
                labelInvalidField: 'الصيغ المدعومة هي jpg,jpeg,svg,webp,png',
            });

            my_file_bond.setOptions('{{route("jobs.thumbnail")}}');


        </script>

    @endpush

</x-app-layout>
