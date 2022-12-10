<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ settings('site_name') ?? config('app.name', settings('site_name')) }}</title> --}}

    {{-- {!! SEOMeta::generate() !!} --}}

    <!-- MINIFIED -->
    {{-- {!! SEO::generate() !!} --}}
    {!! SEOMeta::generate() !!}
    {!! OpenGraph::generate() !!}
    {!! Twitter::generate() !!}
    <!-- LUMEN -->
    {{-- {!! app('seotools')->generate() !!} --}}

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <x-site-icon />

    <!-- Styles -->

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <style>
        :root {
            --color-text: {{ settings('color_6') }};
            --roy: {{ settings('color_1') }};
            --roy-opt: {{ settings('color_4') }};
            --roy-opt2: {{ settings('color_5') }};
            --roy-hov: {{ settings('color_3') }};
            --roy-light: {{ settings('color_2') }};
        }

        .bar {
            width: 75px;
            transform: rotate(-45deg);
            top: 4px;
            left: -20px !important;
            font-size: .9em;
            font-weight: bold;
        }

        .new-jobs {
            background-color: #198754;
            color: white;
        }

        .important-jobs {
            background-color: #fa5661;
            color: white;
        }
    </style>

    <link href=" {{ asset('css/web/bootstrap_5.0.1.css') }}" rel="stylesheet" type="text/css">
    @stack('styles')
    <link href=" {{ asset('css/web/general.css') }}" rel="stylesheet" type="text/css">

    {{-- @vite('resources/css/app.css') --}}

    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-3651563288066981"
        crossorigin="anonymous"></script>

    @stack('head-scripts')

    <!-- Scripts -->
    {!! settings('google_scripts') !!}
</head>

<body>

    @include('layouts.web.header')

    @include('layouts.web.menu')

    {{ $slot }}

    <x-social-media-plateforme />

    @include('layouts.web.footer')

    {{-- <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script> --}}

    <script type="text/javascript" src="{{ asset('js/web/jquery.js') }}"></script>
    <script type="text/javascript" src=" {{ asset('js/web/bootstrap_5.0.1.js') }}"></script>

    {{-- @vite('resources/js/app.js') --}}


    <script defer>
        // get date
        var date = new Date();
        var date2 = new Date().toLocaleDateString('ar-SA');
        var months = ["يناير", "فبراير", "مارس", "إبريل", "مايو", "يونيو",
            "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"
        ];
        var days = ["اﻷحد", "اﻷثنين", "الثلاثاء", "اﻷربعاء", "الخميس", "الجمعة", "السبت"];
        var delDateString = date.getDate() + '/' + (date.getMonth() + 1) + '/' + date.getFullYear() + ' م ';

        $('.mdate').text(delDateString);
        $('.hdate').text(date2);

        // ex-menu show
        $('.ex-menu-ico').click(function() {
            $('.ex-menu').slideToggle(50);
        });

        // open and close sm-menu
        $('.sm-menu-ico .mni').click(function() {
            $('.mni').hide();
            $('.sm-menu-ico .close ').delay().fadeIn(100);
            $(".sm-menu").animate({
                width: 'toggle'
            }, 350);
        });
        $('.sm-menu-ico .close').click(function() {
            $('.sm-menu-ico .close').hide();
            $('.mni').delay().fadeIn(100);
            $(".sm-menu").animate({
                width: 'toggle'
            }, 350);
        });

        // on scroll fix menu
        $(window).bind('scroll', function() {
            if ($(window).scrollTop() > 50) {
                $('.smenu').addClass('f-menu');
            } else {
                $('.smenu').removeClass('f-menu');
            }
        });
    </script>


    <script>
        if ($('.cat2').length) {
            $('.cat2').click(function() {
                $('.cat1').removeClass('cat-act');
                $('.cat2').addClass('cat-act');
                $('.new-job').fadeOut(500);
                $('.imp-job').delay(500).fadeIn();
            });

            $('.cat1').click(function() {
                $('.cat2').removeClass('cat-act');
                $('.cat1').addClass('cat-act');
                $('.imp-job').fadeOut(500);
                $('.new-job').delay(500).fadeIn();
            });
        }
    </script>


    <!-- End Custom Scripts -->
    @stack('scripts')
</body>

</html>
