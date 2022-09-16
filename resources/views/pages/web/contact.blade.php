<x-main-layout>

    @push('styles')
        <link href=" {{ asset('css/web/pages.css') }}" rel="stylesheet" type="text/css">
    @endpush

    <center>
        <div class="contact ">
            <div class="side sdd1">
                <h2>نحن هنا من أجلكم 7 / 24</h2>
                <img src="{{ asset('images/web/contact-us.svg') }}" />
            </div>
            <div class="side sdd2" >
                <form class="frm" >
                    <h3><i class="bi bi-headset"></i> سيتم الرد عليكم في اقل مدة</h3>
                    <input type="text" class="hal-inp fname" required style="float: right" placeholder="الاسم الشخصي" name="fname" />
                    <input type="text" class="hal-inp lname" style="float: left " placeholder="الاسم العائلي" name="lname" />
                    <input type="email" class="inp email" required placeholder="البريد الالكتروني" name="email" />
                    <textarea class="place content" required placeholder="المحتوى"  ></textarea>
                    <button class="sub" type="submit" >ارسال
                     <div class="spinner-border spinner-border-sm sp-load" style='display:none' role="status">
                        <span class="visually-hidden">Loading...</span>
                     </div>
                    </button>
                </form>
            </div>
        </div>
        </center>
    <div class='alert suc-alr'></div>
    <div class='alert err-alr'></div>

    @push('scripts')

        <script src="{{ asset('js/helpers.js') }}"></script>

        <script>

            $('.frm').on('submit' , function(e){
            e.preventDefault() ;
            $('.sp-load').fadeIn() ;
            $('.sub').prop("disabled",true);
            $('.suc-alr').fadeOut() ;
            $.ajaxSetup ({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') ,
                }
            });
            ajax({
                method: 'POST' ,
                url: "{{route('contact.send')}}",
                data:{
                    fname:$('.fname').val(),
                    lname:$('.lname').val(),
                    email:$('.email').val(),
                    content:$('.content').val()
                },
                success:function(response){
                    $('.frm')[0].reset();
                    $('.suc-alr').html('<i class="bi bi-check-circle"></i> تلقينا رسالتك سوف نرد قريبا ') ;
                    $('.suc-alr').fadeIn('slow').delay(8000).fadeOut('slow') ;
                $('.sp-load').hide() ;
                $('.sub').prop("disabled",false);
                },
                error: function(){
                    $('.err-alr').html('<i class="bi bi-exclamation-circle"></i> خطأ في الارسال') ;
                    $('.err-alr').fadeIn('slow').delay(8000).fadeOut('slow') ;
                    $('.sp-load').hide() ;
                    $('.sub').prop("disabled",false);
                }
                }) ;
            });
        </script>
    @endpush



</x-main-layout>
