<x-app-layout>

    @livewireStyles

    <x-admin.headline title="Jobs" icon="folder-google-drive"/>

    @livewire('admin.jobs-container')

    @push('styles')
        <style>
            .change-status label{ cursor: pointer; }
        </style>
    @endpush

    @push('scripts')
        <script src="{{ asset('js/helpers.js') }}"></script>

        <script>
            const changeStatusBtn = $('.change-status');

            if(changeStatusBtn.length) {
                changeStatusBtn.each(function() {
                    $(this).click(function () {
                        const jobId = $(this).attr('data-id');
                        const lable = $(this).find('label');

                        ajax({
                            url: '{{ route('posts.change.status') }}',
                            method: 'PUT',
                            data: {
                                job: jobId,
                            }
                        }).done(response =>  {

                            if(response.errros) return false;

                            const status = response.status;
                            const styles = {
                                1: {
                                    class: 'badge badge-danger',
                                    text: 'مسودة'
                                },
                                2: {
                                    class: 'badge badge-info',
                                    text: 'منشور'
                                }

                            };

                            lable.removeClass();

                            lable.addClass(styles[status].class);
                            lable.text(styles[status].text);


                        });
                    })
                });
            }

        </script>
    @endpush


    @livewireScripts

</x-app-layout>
