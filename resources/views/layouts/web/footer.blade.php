<div class="footer">
    <footer>
            <div class="social">

                <x-web.social-media-sample-button media="facebook" />
                <x-web.social-media-sample-button media="twitter" />
                <x-web.social-media-sample-button media="instagram" />
                <x-web.social-media-sample-button media="linkedin" />
                <x-web.social-media-sample-button media="telegram" />
                <x-web.social-media-sample-button media="snapchat" />
                <x-web.social-media-sample-button media="whatsapp" />

            </div>
            <ul class="list-inline">
                <li class="list-inline-item"><a href="{{ route('home') }}">الرئيسية</a></li>
                <li class="list-inline-item"><a href="{{ route('resume.services') }}">خدمات السيرة</a></li>
                <li class="list-inline-item"><a href="{{ route('about') }}">من نحن</a></li>
                <li class="list-inline-item"><a href="{{ route('contact') }}">تواصل معنا</a></li>
                <li class="list-inline-item"><a href="{{ route('privacy') }}">سياسة الخصوصية</a></li>
                <li class="list-inline-item"><a href="{{ route('terms') }}">الشروط و الأحكام</a></li>
            </ul>
            <p class="copyright">{{ settings('site_name') }} © {{ date('Y') }}</p>
        </footer>
    </div>
