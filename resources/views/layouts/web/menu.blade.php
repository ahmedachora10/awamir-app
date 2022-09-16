<div class="sm-menu text-center">
    <div class="list">
       <a href="/"><div >الرئيسية</div></a>
       <a href="/jobs"><div>الاعلانات الوظيفية</div></a>
       <a href="{{ route('resume.services') }}"><div>خدمات السيرة الذاتية</div></a>
       <a href="{{ route('about') }}"><div >من نحن</div></a>
       <a href="{{ route('privacy') }}"><div >سياسة الخصوصية</div></a>
       <a href="{{ route('contact') }}"><div >تواصل معنا</div></a>
    </div>

    <div class="sm-menu-bot text-center">
        <a href="{{ settings('twitter') }}" target="_blank">
            <div><i class="bi bi-twitter"></i></div>
        </a>

        <a href="{{ settings('instagram') }}" target="_blank">
            <div><i class="bi bi-instagram"></i></div>
        </a>

        <a href="{{ settings('telegram') }}" target="_blank">
            <div><i class="bi bi-telegram"></i></div>
        </a>

        <a href="{{ settings('whatsapp') }}" target="_blank">
            <div><i class="bi bi-whatsapp"></i></div>
        </a>
    </div>
</div>


<div class='smenu text-center'>
    <a href="{{ route('home') }}"><span class='span'>الرئيسية</span></a>
    <a href='/jobs'><span class='span'>الاعلانات الوظيفية</span></a>
    <a href='{{ route('resume.services') }}'><span class='span'>خدمات السيرة الذاتية</span></a>
    <span class="social">
        <a href="{{ settings('twitter') }}" target="_blank">
            <div><i class="bi bi-twitter"></i></div>
        </a>

        <a href="{{ settings('instagram') }}" target="_blank">
            <div><i class="bi bi-instagram"></i></div>
        </a>

        <a href="{{ settings('telegram') }}" target="_blank">
            <div><i class="bi bi-telegram"></i></div>
        </a>

        <a href="{{ settings('whatsapp') }}" target="_blank">
            <div><i class="bi bi-whatsapp"></i></div>
        </a>
    </span>
    <span class="ex-menu-ico"><i class="bi bi-three-dots"></i></span>
    <div class="ex-menu">
        <a href="{{ route('about') }}"><div>من نحن</div></a>
        <a href="{{ route('privacy') }}"><div>سياسة الخصوصية</div></a>
        <a href="{{ route('contact') }}"><div>تواصل معنا</div></a>
        <div class="social2">
            <a href="{{ settings('twitter') }}">
                <div><i class="bi bi-twitter"></i></div>
            </a>

            <a href="{{ settings('instagram') }}">
                <div><i class="bi bi-instagram"></i></div>
            </a>

            <a href="{{ settings('telegram') }}">
                <div><i class="bi bi-telegram"></i></div>
            </a>

            <a href="{{ settings('whatsapp') }}">
                <div><i class="bi bi-whatsapp"></i></div>
            </a>
        </div>
    </div>
</div>

