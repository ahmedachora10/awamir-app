<x-app-layout>

    <x-admin.headline title="New User" icon="account-multiple-plus"/>

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        {{-- <h4 class="card-title">{{ __('Add New User') }}</h4> --}}

        <x-admin.sample-card>

            <div class="d-flex flex-md-row flex-sm-column justify-content-between align-items-center phone-info">
                <div class="form-group col-md-4 col-sm-12">
                    {{-- <img src="https://cdn.jsdelivr.net/npm/svg-country-flags@1.2.10/png100px/ae.png" alt="" srcset=""> --}}
                    <select class="form-control form-control-lg" name="country_code" id="country-code">
                        @forelse ($country_codes as $country)
                            <option value="{{ $country['dialCode'] }}">{{ $country['dialCode'] }} - {{ $country['name'] }}</option>
                        @empty
                            <option value="0">{{ __('No Country Code Loaded!') }}</option>
                        @endforelse
                    </select>
                    <x-admin.error field="country_code" />
                </div> <!-- End Country Code -->

                <div class="form-group col-md-7 col-sm-12">
                    <x-input id="phone" class="form-control-lg" type="tel" name="phone" :value="old('phone')" placeholder="{{ __('Phone') }}" autofocus required />
                    <x-admin.error field="phone" />
                </div> <!-- End Phone Number -->

            </div>

        </x-admin.sample-card> <!-- End First Part -->

        <x-admin.sample-card>

            <div class="row">

                <div class="form-group col-md-6">
                    <x-admin.input type="text" id="name" :value="old('name')" name="name" placeholder="(*) {{ __('Name') }}" required />
                    <x-admin.error field="name" />
                </div> <!-- End Name -->

                <div class="form-group col-md-6">
                    <x-admin.input type="email" :value="old('email')" name="email" id="email" placeholder="{{ __('Email') }}" />
                    <x-admin.error field="email" />
                </div> <!-- End Email -->

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

                <hr>
                <div class="form-group col-md-6">
                    <x-admin.input type="password" name="password" id="password" placeholder="(*) {{ __('Password') }}" required />
                    <x-admin.error field="password" />
                </div> <!-- End Password -->

                <div class="form-group col-md-6">
                    <x-admin.input type="password" class="form-control mb-3 mr-sm-2" name="password_confirmation" id="c_password" placeholder="(*) {{ __('Confirm Password') }}" required />
                    <x-admin.error field="password_confirmation" />
                </div> <!-- End Confirm Password -->
            </div>

        </x-admin.sample-card> <!-- End Middle Part -->

        <x-admin.sample-card>

            <h4 class="card-title mb-5">المراحل والمواد الدراسية</h4> <!-- End Title -->

            <div class="form-group">
                <div class="d-flex flex-wrap justify-content-center align-items-center">
                    @forelse ($levels as $level)
                    <div class="me-4 fw-bold">
                        <x-admin.check-box :title="$level->name" name="levels[]" cls="info" :value="$level->id" />
                    </div>
                    @empty
                    @endforelse
                </div>
                <x-admin.error field="levels" />
            </div> <!-- End Levels -->

            <hr>

            <div class="form-group" id="subjects">
                <div class="d-flex justify-content-center align-items-center flex-wrap">
                    @forelse ($subjects as $subject)
                        <div class="me-4 fw-bold">
                            <x-admin.check-box :title="$subject->name" name="subjects[]" cls="info" :value="$subject->id" />
                        </div>
                    @empty
                    @endforelse
                </div>
                <x-admin.error field="subjects" />
            </div> <!-- End Subjects -->

        </x-admin.sample-card> <!-- End Last Part -->

        <x-admin.sample-card>
            <div class="form-group">
                <x-admin.input type="number" name="discount" id="discount" :value="old('discount')" placeholder="(*) {{ __('Discount') }}" />
                <x-admin.error field="discount" />
            </div>
            <x-admin.button type="submit" class="btn-gradient-primary float-end mt-4">{{ __('Save') }}</x-admin.button>

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
