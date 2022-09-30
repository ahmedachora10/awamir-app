<x-app-layout>

    <x-admin.headline title="Update Users" icon="account-multiple"/>

    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <x-admin.sample-card>

            <div class="row">

                <div class="form-group col-md-6">
                    <x-admin.input type="text" id="name" :value="$user->name" name="name" placeholder="(*) {{ __('Name') }}" autofocus="" required  />
                    <x-admin.error field="name" />
                </div> <!-- End Name -->

                <div class="form-group col-md-6">
                    <x-admin.input type="text" id="email" :value="$user->email" name="email" placeholder="(*) البريد الالكتروني" autofocus="" required  />
                    <x-admin.error field="email" />
                </div> <!-- End Email -->

                <div class="form-group col-md-6">
                    <x-admin.input type="password" :value="old('password')" name="password" id="password" placeholder="{{ __('كلمة المرور') }}" />
                    <x-admin.error field="password" />
                </div> <!-- End password -->

                <div class="form-group col-md-6">
                    <x-admin.input type="password" :value="old('password_confirmation')" name="password_confirmation" id="password_confirmation" placeholder="{{ __('تأكيد كلمة المرور') }}" />
                    <x-admin.error field="password_confirmation" />
                </div> <!-- End Password Confirmation -->

                <hr>
                <div class="form-group col-12">
                    <div class="d-flex justify-content-center align-items-center">
                        @forelse ($roles as $role)
                            <div class="me-4 fw-bold">
                                <x-admin.input-radio  :title="$role->name" name="role" cls="primary" :value="$role->id" :checked="$userRole ? $userRole->id == $role->id : false" />
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

            hr {
                color: #d8d9dd !important;
            }

            .form-check .form-check-label input[type="checkbox"] + .input-helper:before {
                border-color: #57c7d4 !important;
            }


        </style>
    @endpush
</x-app-layout>
