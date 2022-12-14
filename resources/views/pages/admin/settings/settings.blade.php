<x-app-layout>

    <x-admin.headline title="Settings" icon="settings" />

    <div class="row" dir="rtl">
        <!-- General Settings -->
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    {{-- <form class="form-inline" action="{{ route('settings.website.colors') }}"> --}}
                    <h4 class="card-title mb-5">{{ __('الشعار و الايقونة') }}</h4>

                    <div class="row">
                        <div class="col-md-6">
                            <x-admin.input name="logo" type="file" id="logo" />
                        </div>

                        <div class="col-md-6">
                            <x-admin.input name="icon" type="file" id="icon" />
                        </div>
                    </div>
                    {{-- </form> --}}
                </div>
            </div>
        </div>

        <!-- Main Colors Settings -->
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="form-inline" action="{{ route('settings.website.colors') }}" method="POST">
                        @csrf
                        <h4 class="card-title mb-5">{{ __('الالوان الرئيسية') }}</h4>

                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-sm-6 my-3">
                                <div class="rounded-circle circle-color mx-auto"
                                    style="background-color: {{ settings('color_1') }}"></div>
                                <h5 class="fs-6 fw-bold text-center text-dark my-3"> اللون الرئيسي </h5>
                                <x-admin.input name="color_1" type="text" value="{{ settings('color_1') }}"
                                    style="color: {{ settings('color_1') }}" />
                                <x-admin.error field="color_1" />
                            </div>

                            <div class="col-lg-3 col-md-4 col-sm-6 my-3">
                                <div class="rounded-circle circle-color mx-auto"
                                    style="background-color: {{ settings('color_2') }}"></div>
                                <h5 class="fs-6 fw-bold text-center text-dark my-3"> اللون اللون الثانوي </h5>
                                <x-admin.input name="color_2" type="text" value="{{ settings('color_2') }}"
                                    style="color: {{ settings('color_2') }}" />
                                <x-admin.error field="color_2" />
                            </div>

                            <div class="col-lg-3 col-md-4 col-sm-6 my-3">
                                <div class="rounded-circle circle-color mx-auto"
                                    style="background-color: {{ settings('color_3') }}"></div>
                                <h5 class="fs-6 fw-bold text-center text-dark my-3"> اللون التمرير </h5>
                                <x-admin.input name="color_3" type="text" value="{{ settings('color_3') }}"
                                    style="color: {{ settings('color_3') }}" />
                                <x-admin.error field="color_3" />
                            </div>

                            <div class="col-lg-3 col-md-4 col-sm-6 my-3">
                                <div class="rounded-circle circle-color mx-auto"
                                    style="background-color: {{ settings('color_4') }}"></div>
                                <h5 class="fs-6 fw-bold text-center text-dark my-3"> اللون الرئيسي مخفف 1 </h5>
                                <x-admin.input name="color_4" type="text" value="{{ settings('color_4') }}"
                                    style="color: {{ settings('color_4') }}" />
                                <x-admin.error field="color_4" />
                            </div>

                            <div class="col-lg-3 col-md-4 col-sm-6 my-3">
                                <div class="rounded-circle circle-color mx-auto"
                                    style="background-color: {{ settings('color_5') }}"></div>
                                <h5 class="fs-6 fw-bold text-center text-dark my-3"> اللون الرئيسي مخفف 2 </h5>
                                <x-admin.input name="color_5" type="text" value="{{ settings('color_5') }}"
                                    style="color: {{ settings('color_5') }}" />
                                <x-admin.error field="color_5" />
                            </div>

                            <div class="col-lg-3 col-md-4 col-sm-6 my-3">
                                <div class="rounded-circle circle-color mx-auto"
                                    style="background-color: {{ settings('color_6') }}"></div>
                                <h5 class="fs-6 fw-bold text-center text-dark my-3"> لون بعض الخطوط </h5>
                                <x-admin.input name="color_6" type="text" value="{{ settings('color_6') }}"
                                    style="color: {{ settings('color_6') }}" />
                                <x-admin.error field="color_6" />
                            </div>


                        </div>

                        <button type="submit" class="btn btn-gradient-primary mb-2">{{ __('Save') }}</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Seo Settings -->
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="form-inline" method="POST" action="{{ route('settings.website.seo') }}">
                        @csrf
                        <h4 class="card-title mb-5">{{ __('روابط الهيدر (head) ومعلمومات عن الموقع') }}</h4>
                        <!-- <p class="card-description"> Use the <code>.form-inline</code> class to display a series of labels, form controls, and buttons on a single horizontal row </p> -->

                        <div class="row">
                            <div class="form-group col-md-6">
                                <x-admin.input type="text" class="form-control mb-3 mr-sm-2" :value="settings('site_name')"
                                    name="site_name" id="site_name" placeholder="اسم الموقع" />
                                <x-admin.error field="site_name" />
                            </div>

                            <div class="form-group col-md-6">
                                <x-admin.input type="text" class="form-control mb-3 mr-sm-2" :value="settings('tagline')"
                                    name="tagline" id="tagline" placeholder="Slogan" />
                                <x-admin.error field="tagline" />
                            </div>

                            <div class="form-group col-12">
                                <x-admin.text-area class="form-control" id="site_description" :value="settings('site_description')"
                                    name="site_description" placeholder="وصف عام عن الموقع" rows="4">
                                    {{ settings('site_description') }}
                                </x-admin.text-area>
                                <x-admin.error field="site_description" />
                            </div>

                            <div class="form-group col-12">
                                <x-admin.text-area class="form-control" id="google_scripts" :value="settings('google_scripts')"
                                    name="google_scripts" placeholder="روابط واكواد غوغل .." rows="14">
                                    {{ settings('google_scripts') }}
                                </x-admin.text-area>
                                <x-admin.error field="google_scripts" />
                            </div>

                        </div>

                        <button type="submit" class="btn btn-gradient-primary mb-2">{{ __('Save') }}</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Social Media Settings -->
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <form class="form-inline" action="{{ route('settings.website.social-media') }}" method="POST">
                        @csrf
                        <h4 class="card-title mb-5">{{ __('Social Media') }}</h4>
                        <!-- <p class="card-description"> Use the <code>.form-inline</code> class to display a series of labels, form controls, and buttons on a single horizontal row </p> -->

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="facebook" class="fw-bold text-secondary">Facebook</label>
                                <x-admin.input type="text" class="form-control mb-3 mr-sm-2" :value="settings('facebook')"
                                    name="facebook" id="facebook" placeholder="Facebook" />
                                <x-admin.error field="facebook" />
                            </div>

                            <div class="form-group col-md-6">
                                <label for="facebook" class="fw-bold text-secondary">Whatsapp</label>
                                <x-admin.input type="text" class="form-control mb-3 mr-sm-2" :value="settings('whatsapp')"
                                    name="whatsapp" id="whatsapp" placeholder="Whatsapp" />
                                <x-admin.error field="whatsapp" />
                            </div>

                            <div class="form-group col-md-6">
                                <label for="facebook" class="fw-bold text-secondary">Whatsapp Group</label>
                                <x-admin.input type="text" class="form-control mb-3 mr-sm-2" :value="settings('whatsapp_group')"
                                    name="whatsapp_group" id="whatsapp_group" placeholder="Whatsapp Group" />
                                <x-admin.error field="whatsapp_group" />
                            </div>

                            <div class="form-group col-md-6">
                                <label for="facebook" class="fw-bold text-secondary">Twitter</label>
                                <x-admin.input type="text" class="form-control mb-3 mr-sm-2" :value="settings('twitter')"
                                    name="twitter" id="twitter" placeholder="Twitter" />
                                <x-admin.error field="twitter" />
                            </div>

                            <div class="form-group col-md-6">
                                <label for="facebook" class="fw-bold text-secondary">Instagram</label>
                                <x-admin.input type="text" class="form-control mb-3 mr-sm-2" :value="settings('instagram')"
                                    name="instagram" id="instagram" placeholder="Instagram" />
                                <x-admin.error field="instagram" />
                            </div>

                            <div class="form-group col-md-6">
                                <label for="facebook" class="fw-bold text-secondary">Snapchat</label>
                                <x-admin.input type="text" class="form-control mb-3 mr-sm-2" :value="settings('snapchat')"
                                    name="snapchat" id="snapchat" placeholder="Snapchat" />
                                <x-admin.error field="snapchat" />
                            </div>

                            <div class="form-group col-md-6">
                                <label for="facebook" class="fw-bold text-secondary">Linked In</label>
                                <x-admin.input type="text" class="form-control mb-3 mr-sm-2" :value="settings('linkedin')"
                                    name="linkedin" id="linkedin" placeholder="Linked In" />
                                <x-admin.error field="linkedin" />
                            </div>

                            <div class="form-group col-md-6">
                                <label for="facebook" class="fw-bold text-secondary">Telegram</label>
                                <x-admin.input type="text" class="form-control mb-3 mr-sm-2" :value="settings('telegram')"
                                    name="telegram" id="telegram" placeholder="Telegram" />
                                <x-admin.error field="telegram" />
                            </div>
                        </div>

                        <button type="submit" class="btn btn-gradient-primary mb-2">{{ __('Save') }}</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Contact Us Settings -->
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body social-bg">
                    <form class="form-inline" method="POST" action="{{ route('settings.website.contact') }}">
                        @csrf
                        <h4 class="card-title mb-5">{{ __(' معلومات التواصل ') }}</h4>
                        <!-- <p class="card-description"> Use the <code>.form-inline</code> class to display a series of labels, form controls, and buttons on a single horizontal row </p> -->

                        <div class="row">
                            <div class="form-group col-sm-6 col-12">
                                <x-admin.input type="email" class="form-control mb-3 mr-sm-2" :value="settings('email')"
                                    name="email" id="email" placeholder=" البريد الخاص بتلقي الاشعارات" />
                                <x-admin.error field="email" />
                            </div>

                            <div class="form-group col-sm-6 col-12">
                                <x-admin.input type="text" class="form-control mb-3 mr-sm-2" :value="settings('cv_phone_number')"
                                    name="cv_phone_number" id="cv_phone_number"
                                    placeholder="رقم الهاتف الخاص بتلقي خدمات السيرة" />
                                <x-admin.error field="cv_phone_number" />
                            </div>

                        </div>

                        <button type="submit" class="btn btn-gradient-primary mb-2">{{ __('Save') }}</button>
                    </form>
                </div>
            </div>
        </div>


        <!-- Socail Media Buttons Color Settings -->
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body social-bg">
                    <form class="form-inline" method="POST"
                        action="{{ route('settings.website.social-media.buttons.color') }}">
                        @csrf
                        <h4 class="card-title mb-5">{{ __('ألوان أزرار الرئيسية') }}</h4>
                        <!-- <p class="card-description"> Use the <code>.form-inline</code> class to display a series of labels, form controls, and buttons on a single horizontal row </p> -->

                        <div class="row">
                            <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                <x-admin.input type="color"
                                    class="form-control mb-3 mr-sm-2 p-0 input-color circle-color" :value="settings('snapchat_bg')"
                                    name="snapchat_bg" id="snapchat_bg" placeholder="اسم الموقع" />
                                <h5 class="fs-6 text-dark my-3"> سناب شات </h5>
                                <x-admin.error field="snapchat_bg" />
                            </div>

                            <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                <x-admin.input type="color"
                                    class="form-control mb-3 mr-sm-2 p-0 input-color circle-color" :value="settings('telegram_bg')"
                                    name="telegram_bg" id="telegram_bg" placeholder="Slogan" />
                                <h5 class="fs-6 text-dark my-3"> تليغرام </h5>
                                <x-admin.error field="telegram_bg" />
                            </div>

                            <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                <x-admin.input type="color"
                                    class="form-control mb-3 mr-sm-2 p-0 input-color circle-color" :value="settings('instagram_bg')"
                                    name="instagram_bg" id="instagram_bg" placeholder="Slogan" />
                                <h5 class="fs-6 text-dark my-3"> انستغرام </h5>
                                <x-admin.error field="instagram_bg" />
                            </div>

                            <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                <x-admin.input type="color"
                                    class="form-control mb-3 mr-sm-2 p-0 input-color circle-color" :value="settings('twitter_bg')"
                                    name="twitter_bg" id="twitter_bg" placeholder="Slogan" />
                                <h5 class="fs-6 text-dark my-3"> تويتر </h5>
                                <x-admin.error field="twitter_bg" />
                            </div>

                        </div>

                        <button type="submit" class="btn btn-gradient-primary mb-2">{{ __('Save') }}</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Jobs Buttons Color Settings -->
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body social-bg">
                    <form class="form-inline" method="POST"
                        action="{{ route('settings.website.job.buttons.color') }}">
                        @csrf
                        <h4 class="card-title mb-5">{{ __('ألوان أزرار صفحة الوظيفة') }}</h4>
                        <!-- <p class="card-description"> Use the <code>.form-inline</code> class to display a series of labels, form controls, and buttons on a single horizontal row </p> -->

                        <div class="row">
                            <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                <x-admin.input type="color"
                                    class="form-control mb-3 mr-sm-2 p-0 input-color circle-color" :value="settings('apply_bg')"
                                    name="apply_bg" id="apply_bg" placeholder="اسم الموقع" />
                                <h5 class="fs-6 text-dark my-3"> رابط التقديم </h5>
                                <x-admin.error field="apply_bg" />
                            </div>

                            <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                <x-admin.input type="color"
                                    class="form-control mb-3 mr-sm-2 p-0 input-color circle-color" :value="settings('cv_bg')"
                                    name="cv_bg" id="cv_bg" />
                                <h5 class="fs-6 text-dark my-3"> طلب السيرة </h5>
                                <x-admin.error field="cv_bg" />
                            </div>

                            <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                <x-admin.input type="color"
                                    class="form-control mb-3 mr-sm-2 p-0 input-color circle-color" :value="settings('whatsapp_share_bg')"
                                    name="whatsapp_share_bg" id="whatsapp_share_bg" placeholder="Slogan" />
                                <h5 class="fs-6 text-dark my-3"> المشاركة عبر واتساب </h5>
                                <x-admin.error field="whatsapp_share_bg" />
                            </div>

                            <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                <x-admin.input type="color"
                                    class="form-control mb-3 mr-sm-2 p-0 input-color circle-color" :value="settings('register_through_awamir_bg')"
                                    name="register_through_awamir_bg" id="register_through_awamir_bg"
                                    placeholder="Slogan" />
                                <h5 class="fs-6 text-dark my-3"> التسجيل عبر أوامر </h5>
                                <x-admin.error field="register_through_awamir_bg" />
                            </div>

                            <div class="form-group col-lg-3 col-md-4 col-sm-6 col-12">
                                <x-admin.input type="color"
                                    class="form-control mb-3 mr-sm-2 p-0 input-color circle-color" :value="settings('source_bg')"
                                    name="source_bg" id="source_bg" placeholder="Slogan" />
                                <h5 class="fs-6 text-dark my-3"> المصدر </h5>
                                <x-admin.error field="source_bg" />
                            </div>

                        </div>

                        <button type="submit" class="btn btn-gradient-primary mb-2">{{ __('Save') }}</button>
                    </form>
                </div>
            </div>
        </div>


        <!-- Jobs Buttons Color Settings -->
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body social-bg">
                    <form class="form-inline" method="POST" action="{{ route('settings.website.pages') }}">
                        @csrf
                        <h4 class="card-title mb-5">{{ __(' الصفحات الثابثة ') }}</h4>
                        <!-- <p class="card-description"> Use the <code>.form-inline</code> class to display a series of labels, form controls, and buttons on a single horizontal row </p> -->

                        <div class="group-form">
                            <label class="fw-bold mb-2">من نحن</label>
                            <x-admin.text-area class="form-control" class="text-area" id="about" name="about"
                                placeholder="من نحن" rows="14">
                                {{ settings('about') }}
                            </x-admin.text-area>
                        </div>

                        <div class="group-form my-4">
                            <label class="fw-bold mb-2"> الخصوصية </label>
                            <x-admin.text-area class="form-control" class="text-area" id="privacy" name="privacy"
                                placeholder="من نحن" rows="14">
                                {{ settings('privacy') }}
                            </x-admin.text-area>
                        </div>

                        <div class="group-form my-4">
                            <label class="fw-bold mb-2"> الشروط والاحكام </label>
                            <x-admin.text-area class="form-control" class="text-area" id="terms" name="terms"
                                placeholder="من نحن" rows="14">
                                {{ settings('terms') }}
                            </x-admin.text-area>
                        </div>

                        <button type="submit"
                            class="btn btn-gradient-primary mb-2 mt-3">{{ __('Save') }}</button>
                    </form>
                </div>
            </div>
        </div>


    </div>


    @push('styles')
        <link href="https://unpkg.com/filepond@^4/dist/filepond.css" rel="stylesheet" />
        <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
            rel="stylesheet" />

        <style>
            .circle-color {
                width: 50px !important;
                height: 50px;
            }

            .social-bg h5 {
                font-weight: 500 !important;
            }
        </style>
    @endpush

    @push('scripts')
        {{-- <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> --}}
        <script
            src="https://cdn.jsdelivr.net/npm/filepond-plugin-image-preview@4.6.10/dist/filepond-plugin-image-preview.min.js">
        </script>
        <script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
        <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        <script src="{{ asset('js/helpers.js') }}"></script>

        <script>
            FilePond.registerPlugin(FilePondPluginImagePreview);

            const uploadFile = {

                text: 'شعار الموقع ',
                extensions: 'jpg,jpeg,svg,webp,png,ico',

                make(ele, route = '', fullPath = '', imageName = '') {
                    const my_file_bond = filePond(ele, {
                        required: true,
                        labelIdle: ` سحب وافلات ${this.text} <span class="filepond--label-action text-primary"> تصفح </span>`,
                        labelFileLoadError: `${this.extensions} الصيغ المدعومة هي`,
                        labelInvalidField: `${this.extensions} الصيغ المدعومة هي `,
                    });

                    if (imageName != '') {
                        my_file_bond.preview(fullPath, imageName);
                    }

                    $('#' + ele.id).on('change drop', function() {
                        my_file_bond.setOptions(route);
                    });

                }
            }

            uploadFile.make(
                document.querySelector('input[id=logo]'),
                "{{ route('settings.website.logo') }}",
                "{{ asset(settings('logo')) }}",
                "{{ str_replace('/storage/images/logo/', '', settings('logo')) }}"
            );

            const icon = uploadFile;
            icon.text = 'ايقونة الموقع';
            icon.extensions = 'ico';
            icon.make(
                document.querySelector('input[id=icon]'),
                "{{ route('settings.website.logo.icon') }}",
                "{{ asset(settings('ico')) }}",
                "{{ str_replace('/storage/images/logo/icon/', '', settings('ico')) }}"
            );

            const linksContainer = $('.links-container tbody');

            const row = (link) => {
                return `
                    <tr>
                        <td>${link}</td>

                        <td class="delete-link">
                            <input type="hidden" name="register_through_awamir[]" value="${link}">
                            <i class="mdi mdi-delete text-danger"></i>
                        </td>
                    </tr>
                `;
            }

            // $('#add-link').click(function() {
            //     const value = $('#link-value').val();

            //     linksContainer.append(row(value));
            // });

            // $('.delete-link').each(function() {
            //     $(this).click(function() {
            //         $(this).parents('tr').remove();
            //     });
            // });

            tinymce.init({
                selector: '.text-area',
                // inline: true,
                plugins: [
                    'a11ychecker', 'advlist', 'advcode', 'advtable', 'autolink', 'checklist', 'export',
                    'lists', 'link', 'image', 'charmap', 'preview', 'anchor', 'searchreplace', 'visualblocks',
                    'powerpaste', 'fullscreen', 'formatpainter', 'insertdatetime', 'media', 'table', 'help',
                    'wordcount'
                ],
                toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
                    'alignleft aligncenter alignright alignjustify | ' +
                    'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
            });
        </script>
    @endpush

</x-app-layout>
