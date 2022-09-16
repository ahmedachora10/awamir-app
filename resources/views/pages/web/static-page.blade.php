<x-main-layout>

    @push('styles')
        <link href=" {{ asset('css/web/pages.css') }}" rel="stylesheet" type="text/css">
    @endpush

    <center>
        <div class="page">
            {!! $page !!}
        </div>
        <div class='page-side'>
            <div class="ot-page">
                @if(request()->routeIs('privacy') || request()->routeIs('terms'))
                    <a href="{{ route('about') }}"><div class="ot">
                        من نحن <i class="bi bi-arrow-left-short"></i>
                    </div></a>
                @endif

                @if(request()->routeIs('about') || request()->routeIs('terms'))
                    <a href="{{ route('privacy') }}"><div class="ot">
                    سياسة الخصوصية <i class="bi bi-arrow-left-short"></i>
                    </div></a>
                @endif

                <a href="{{ route('contact') }}"><div class="ot">
                    تواصل معنا <i class="bi bi-arrow-left-short"></i>
                </div></a>
                <a href="/jobs"><div class="ot">
                    الوظائف <i class="bi bi-arrow-left-short"></i>
                </div></a>
            </div>
        </div>
    </center>


</x-main-layout>
