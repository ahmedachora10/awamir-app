<x-main-layout>
    @push('styles')
        <link href=" {{ asset('css/web/pages.css') }}" rel="stylesheet" type="text/css">
    @endpush

    <center>
        <div class='service'>
            <div class="side" style="width: 97%;">
                <h3 style="font-size: 30px;color:var(--color-text)"><span style='padding :2px 0 ; border-bottom: 2pt solid var(--roy);'>السيرة الذاتية </span></h3>
                <br>
                <p style="font-size: 18px;line-height: 33px;max-width: 800px;color:var(--color-text)">

                هي بوابة العبور للوظيفة في الوقت الحالي
                فهي من تظهر لمدير العمل مؤهلاتك وخبراتك
                ومن خلال تصميمها بالشكل الملائم
                تكون فرصتك أكبر في حصولك على الوظيفة .</p>

                <img style="max-width: 350px;" src="{{ asset('images/web/resume.svg') }}" /><br>
                <a target='_blank' href="{{ settings('cv_phone_number') }}"><button class="sub" style="width: 95%;max-width: 450px;">طلب <i class="bi bi-whatsapp"></i></button></a>

            </div>
        </div>
    </center>
  <div class='alert suc-alr'></div>
  <div class='alert err-alr'></div>

</x-main-layout>
