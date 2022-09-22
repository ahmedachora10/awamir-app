<x-app-layout>

    <x-admin.headline title="New User" icon="account-multiple-plus"/>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <x-admin.sample-card>

            <div class="row">

                <div class="form-group col-md-6">
                    <x-admin.input type="text" id="name" :value="old('name')" name="name" placeholder="(*) البريد الالكتروني" autofocus="" required  />
                    <x-admin.error field="name" />
                </div> <!-- End Name -->

                <div class="form-group col-md-6">
                    <x-admin.input type="password" :value="old('password')" name="password" id="password" placeholder="{{ __('كلمة المرور') }}" />
                    <x-admin.error field="password" />
                </div> <!-- End password -->

                <div class="form-group col-md-12">
                    <x-admin.input type="password" :value="old('password_confirmation')" name="password_confirmation" id="password_confirmation" placeholder="{{ __('تأكيد كلمة المرور') }}" />
                    <x-admin.error field="password_confirmation" />
                </div> <!-- End Password Confirmation -->

                <hr>
                <div class="form-group col-12">
                    <div class="d-flex justify-content-center align-items-center">
                        @forelse ($roles as $role)
                            <div class="me-4 fw-bold">
                                <x-admin.input-radio :title="$role->name" name="role" cls="primary" :value="$role->id" />
                            </div>
                        @empty
                        @endforelse
                    </div>
                    <x-admin.error field="role" />
                </div> <!-- End Role -->

                <x-admin.button type="submit" class="btn-gradient-primary col-3 float-end mt-4" style="width: 150px">{{ __('Save') }}</x-admin.button>

        </x-admin.sample-card>

    </form>

    @push('style')
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

        <style>

            @media (max-width: 557px) {
                .phone-info {
                    flex-direction: column !important;
                }
                .phone-info > div {
                    -webkit-box-flex: 0 !important;
                    -ms-flex: 0 0 auto !important;
                    flex: 0 0 auto !important;
                    width: 100% !important;
                }
            }

            hr {
                color: #d8d9dd !important;
            }

            .form-check .form-check-label input[type="checkbox"] + .input-helper:before {
                border-color: #57c7d4 !important;
            }

            .form-group > .select2-container {
                width: 100% !important;
                border-color: #ebedf2 !important;

                background: transparent;
                border-radius: 0;
                font-size: .9375rem;
                border: 1px solid #ebedf2;
                font-family: "ubuntu-regular", sans-serif;
                font-size: 0.8125rem;
                box-shadow: none;
                min-height: 3.175rem;
                padding: 0.1rem 1.94rem;
                font-size: 1.25rem;
                border-radius: 0.3rem;

                display: block;
                width: 100%;
                font-size: 0.8125rem;
                font-weight: 400;
                line-height: 1;
                color: #212529;
                background-color: color(white);
                background-clip: padding-box;
                border: 1px solid #ced4da;
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                border-radius: 2px;
                -webkit-transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
                transition: border-color 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
                transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
                transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out, -webkit-box-shadow 0.15s ease-in-out;
            }

            .form-group > .select2-container--default .select2-selection--single {
                border: none !important;
            }

            .form-group > .select2-container--default .select2-selection--single .select2-selection__arrow {
                top: 17px !important;
                left: 10px !important;
            }

            .form-group .select2-container--default .select2-selection--single .select2-selection__rendered {
                line-height: 47px !important;
            }

        </style>
    @endpush

    @push('script')
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

        <script defer>

            $(document).ready(function() {
                $.fn.select2.defaults.set('placeholder', '{{ __("Choose Your Country Code") }}');
                $("#country-code").select2({});

                // Get roles & discount & subjects
                const roles = $("[name=role]");
                const discount = $("#discount");
                const subjects = $("#subjects");

                // Check if a user has student role
                if($("[name=role]:checked").val() != 2){
                    discount.parent().slideUp();
                    discount.removeAttr('required');
                    discount.removeAttr('name');

                    // Hide Subjects
                    subjects.slideUp();
                }

                // Show & hide discount depends on role name
                roles.change(function () {

                    const value = $(this).val();

                    if(value == 2) {
                        discount.parent().slideDown();
                        discount.attr('required', true);

                        if(!discount.attr('name')) {
                            discount.attr('name', 'discount')
                        }

                        // Display Subjects
                        subjects.slideDown();

                    } else {
                        discount.parent().slideUp();
                        discount.removeAttr('required');
                        discount.removeAttr('name');

                        // Hide Subjects
                        subjects.slideUp();
                    }
                });
            });
        </script>
    @endpush

</x-app-layout>
