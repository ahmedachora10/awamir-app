<x-guest-layout>
    <x-auth-card>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />


        {{-- <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form> --}}

        <!-- Section: Design Block -->
        <section class="text-center">
            <!-- Background image -->
            <div class="p-5 bg-image position-relative" style="
                background-image: url('https://th.bing.com/th/id/OIP.nQEOn-BUhcyb_e3Kt3dj1wHaE8?pid=ImgDet&rs=1');
                background-size:cover;
                height: 300px;
            ">
                <a href="/" class="position-relative" style="z-index: 2">
                    <x-application-logo width="80" height="80" class="w-50 h-50" />
                </a>
                <div class="position-absolute w-100 h-100 bg-dark" style="top: 0; left:0; z-index:1; opacity:.8"></div>
            </div>
            <!-- Background image -->

            <div class="card mx-4 mx-md-5 shadow border-0 position-relative" style="
                margin-top: -100px;
                background: hsla(0, 0%, 100%, 0.8);
                backdrop-filter: blur(30px);
                z-index: 2
                ">
                <div class="card-body py-5 px-md-5">
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-8">
                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input type="email" name="email" id="email" class="form-control p-3" placeholder="البريد الالكتروني" autofocus />
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input type="password" id="password" name="password" class="form-control p-3" required autocomplete="current-password" placeholder="كلمة المرور" />
                                </div>

                                <!-- Submit button -->
                                <button type="submit" class="float-start btn btn-dark btn-block mb-4 py-2 px-3 fw-bold">
                                    دخول
                                </button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
  <!-- Section: Design Block -->

    </x-auth-card>
</x-guest-layout>
