<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    {{-- Favicon --}}
    <link rel="shortcut icon" href="{{ asset('images/logo.svg') }}" />
    <link rel="icon" href="{{ asset('images/logo.svg') }}" sizes="32x32">
    <link rel="icon" href="{{ asset('images/logo.svg') }}" sizes="192x192">

    <link rel="apple-touch-icon" href="{{ asset('images/logo.svg') }}">
    <meta name="msapplication-TileImage" content="{{ asset('images/logo.svg') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@200;300;400;500;700;800;900&display=swap" rel="stylesheet">

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">

    @stack('styles')
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/dashboard-style.css') }}">

    @vite('resources/css/app.css')

    <style>
        .form-control {font-size: 0.9125rem !important;}

        .form-check-reverse {
            padding-right: 1.5em;
            padding-left: 0;
            text-align: right;
        }

        .form-switch.form-check-reverse {
            padding-right: 2.5em;
            padding-left: 0;
        }

        .form-switch.form-check-reverse .form-check-input {
            margin-right: -2.5em;
            margin-left: 0;
        }

    </style>

    <!-- Scripts -->
</head>

<body>
    <div class="container-scroller">
        @include('layouts.navigation')


        <!-- Wrraper -->
        <div class="container-fluid page-body-wrapper">

            <!-- Left Navigation -->
            @include('layouts.left-navigation')

            <div class="main-panel">
                <div class="content-wrapper">
                    <x-admin.message />
                    {{ $slot }}
                </div>
            </div>

        </div>
    </div>

    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('js/jquery.cookie.js') }}" type="text/javascript"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('js/off-canvas.js') }}"></script>
    <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/misc.js') }}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{ asset('js/dashboard.js') }}"></script>
    <script src="{{ asset('js/todolist.js') }}"></script>
    <!-- End custom js for this page -->

    @vite('resources/js/app.js')

    @stack('scripts')
    <!-- End Custom Scripts -->
</body>

</html>
