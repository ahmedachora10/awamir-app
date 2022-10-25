<x-main-layout>

    @push('styles')
        <link href="{{ asset('css/web/jobs.css') }}" rel="stylesheet" type="text/css">
    @endpush


    <center>
        <div class="main">
            <form action="" method="get">
                <div class="search">
                    <input type="search" name="squery" class="squery" value="{{ old('query') }}"
                        placeholder="ابحث عن الوظيفة المناسبة " /><button type="submit"><i
                            class="bi bi-search"></i></button>
                </div>
            </form>
            <div class="filter">
                &nbsp;&nbsp;<i class="bi bi-filter"></i>
                <div class="contain">
                    <span class="job-f ff1 act-f" id=""> الوظائف الجديدة</span>
                    <div class="order order1">
                        <div class="sel" id="new" onclick="type(this)">الوظائف الجديدة</div>
                        <div class="sel" id="imp" onclick="type(this)">الوظائف المهمة</div>
                    </div>
                </div>
                <div class="contain">
                    <span class="job-f ff2" id=""> الفئة</span>
                    <div class="order order2">
                        @foreach ($categories as $category)
                            <div class="sel" id="{{ $category->id }}" onclick="category(this)">{{ $category->name }}
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="contain">
                    <span class="job-f ff3" id=""> المدينة</span>
                    <span class="job-f clear"><i class="bi bi-x"></i></span>
                    <div class="order order3">
                        @foreach ($cities as $city)
                            <div class="sel" id="{{ $city->id }}" onclick="city(this)">{{ $city->name }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="jobs">

                <div class="load-sp2">
                    <div class="spinner-border spinner-border-sm sssp" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                </div>
                <div class="jobs-j">

                    @forelse ($jobs as $job)
                        {{-- <a href="{{ route('web.jobs.show', $job) }}"><div class="jobtab" style="max-width: 45%;">
                    <div class="sec1 ">
                        <div class="con">
                          <img src="{{ asset('storage/images/jobs/' . $job->image) }}" >
                        </div>
                    </div>
                    <div class="sec2">
                        <h3>{{$job->name}} </h3>
                        <div class="company">{{$job->company}}</div>
                        <p>{{Str::limit(Str::replace('&nbsp;', ' ', strip_tags($job->description)), 65, ' ...');}}</p>
                    </div>
                    </div></a> --}}

                        <x-web.job-card :job="$job" />
                    @empty
                        <img style='max-width: 80%;' src="{{ asset('images/web/no-result.png') }}" /><br>
                        <span style="font-size: 15px ;margin:10px 0;">لم يعد البحث بأي نتائج</span>
                    @endforelse
                </div>
            </div>
            <br>
            <div class="loaded-jobs"></div>
            @if ($jobs->count() < 8)
                <style>
                    .more {
                        display: none
                    }
                </style>
            @endif

            <button class="more">وظائف اكثر ...
                <div class="spinner-border spinner-border-sm sp-load" style='display:none' role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </button>

        </div>
        <div class="side">

            <div class="subscribe">
                <img src="{{ asset('images/web/email.jpg') }}" />
                <div class="su">
                    <h4 style='line-height:34px'>اشترك مجانا لتكون على اطلاع دائم على أهم الوظائف عبر رسائل البريد
                        الالكتروني</h4>
                    <form action="" method="">
                        <input type="email" class="email" placeholder="البريد الالكتروني" required />
                        <button type='submit' class="ssb">اشترك
                            <div class="spinner-border spinner-border-sm sp-load" style='display:none' role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </center>
    <div class='alert suc-alr'></div>
    <div class='alert err-alr'></div>


    @push('scripts')
        <script src="{{ asset('js/helpers.js') }}"></script>

        <script>
            // subsucribe add

            $('.subscribe form').on('submit', function(e) {
                e.preventDefault();
                $('.sp-load').fadeIn();
                $('.ssb').prop("disabled", true);
                $('.suc-alr').fadeOut();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                });
                $.ajax({
                    method: 'post',
                    url: "{{ route('web.subscriber') }}",
                    data: {
                        email: $('.email').val(),
                    },
                    success: function(response) {

                        if (response.errors) {
                            $('.err-alr').html(
                                `<i class="bi bi-exclamation-circle"></i> ${response.errors[0]}`);
                            $('.err-alr').fadeIn('slow').delay(8000).fadeOut('slow');
                            $('.sp-load').hide();
                            $('.ssb').prop("disabled", false);
                            return false;
                        }

                        $('.subscribe form')[0].reset();
                        $('.suc-alr').html(
                            '<i class="bi bi-check-circle"></i>  تمت اضافة بريدك الالكتروني بنجاح ');
                        $('.suc-alr').fadeIn('slow').delay(8000).fadeOut('slow');
                        $('.sp-load').hide();
                        $('.ssb').prop("disabled", false);
                    },
                    error: function() {
                        $('.err-alr').html('<i class="bi bi-exclamation-circle"></i> خطأ في الارسال');
                        $('.err-alr').fadeIn('slow').delay(8000).fadeOut('slow');
                        $('.sp-load').hide();
                        $('.ssb').prop("disabled", false);
                    }
                });
            });


            // load more jobs
            var page = 2;
            $('.more').click(function() {
                $('.sp-load').fadeIn();
                $('.more').prop("disabled", true);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                });

                $.ajax({
                    method: 'get',
                    url: "{{ route('web.jobs.load') }}?page=" + page + "&category=" + $('.ff2').attr("id") +
                        "&city=" + $('.ff3').attr("id") + "&type=" + $('.ff1').attr("id"),

                    success: function(response) {
                        if (response == '') {
                            $('.more').hide();
                        }
                        page++;
                        $('.sp-load').hide();
                        $(".loaded-jobs").append(response);
                        $('.more').prop("disabled", false);
                    }
                });
            });

            //filter (important | new)
            $('.ff1').click(function() {
                $('.order1').fadeToggle(100);
            });

            // Category
            $('.ff2').click(function() {
                $('.order2').fadeToggle(100);
            });

            $('.ff3').click(function() {
                $('.order3').fadeToggle(100);
            });

            function type(cl) {
                page = 2;
                if (cl.id == 'new') {
                    $('.ff1').text('الوظائف الجديدة');
                } else {
                    $('.ff1').text('الوظائف المهمة');
                }
                jQuery('.ff1').attr("id", cl.id);
                $('.order1').hide();

                var type = $('.ff1').attr("id");
                var category = $('.ff2').attr("id");
                var city = $('.ff3').attr("id");
                $('.load-sp2').fadeIn(100);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                });
                $.ajax({
                    method: 'get',
                    url: "{{ route('web.jobs.load') }}",
                    data: {
                        type: type,
                        category: category,
                        city: city
                    },
                    success: function(response) {
                        $('.load-sp2').fadeOut(100);
                        if (response == '') {
                            $('.more').hide();
                        }

                        $('.sp-load2').hide();
                        $(".loaded-jobs").html('');
                        $('.jobs-j').html(response);
                    }
                });
            }

            function category(cl) {
                page = 2;
                $('.ff2').text(cl.id);
                jQuery('.ff2').attr("id", cl.id);
                $('.ff2').addClass('act-f');
                $('.order2').hide();

                var type = $('.ff1').attr("id");
                var category = $('.ff2').attr("id");
                var city = $('.ff3').attr("id");
                $('.load-sp2').fadeIn(100);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                });
                $.ajax({
                    method: 'get',
                    url: "{{ route('web.jobs.load') }}",
                    data: {
                        type: type,
                        category: category,
                        city: city
                    },
                    success: function(response) {
                        $('.load-sp2').fadeOut(100);
                        if (response == '') {
                            $('.more').hide();
                        }

                        $('.sp-load2').hide();
                        $(".loaded-jobs").html('');
                        $('.jobs-j').html(response);
                    }
                });

            }

            function city(cl) {
                page = 2;
                $('.ff3').text(cl.id);
                jQuery('.ff3').attr("id", cl.id);
                $('.ff3').addClass('act-f');
                $('.order3').hide();

                var type = $('.ff1').attr("id");
                var category = $('.ff2').attr("id");
                var city = $('.ff3').attr("id");
                $('.load-sp2').fadeIn(100);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                });
                $.ajax({
                    method: 'get',
                    url: "{{ route('web.jobs.load') }}",
                    data: {
                        type: type,
                        category: category,
                        city: city
                    },
                    success: function(response) {
                        $('.load-sp2').fadeOut(100);
                        if (response == '') {
                            $('.more').hide();
                        }

                        $('.sp-load2').hide();
                        $(".loaded-jobs").html('');
                        $('.jobs-j').html(response);
                    }
                });
            }
            $('.clear').click(function() {
                var page = 2;
                $('.ff1').text('الوظائف الجديدة');
                $('.ff2').text('الفئة');
                $('.ff3').text('المدينة');
                $('.ff2').removeClass('act-f');
                $('.ff3').removeClass('act-f');
                jQuery('.ff3').attr("id", '');
                jQuery('.ff2').attr("id", '');
                jQuery('.ff1').attr("id", '');
                $('.load-sp2').fadeIn(100);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    }
                });
                $.ajax({
                    method: 'get',
                    url: "{{ route('web.jobs.load') }}",
                    data: {
                        type: '',
                        category: '',
                        city: ''
                    },
                    success: function(response) {
                        $('.load-sp2').fadeOut(100);
                        if (response == '') {
                            $('.more').hide();
                        }
                        page++;
                        $('.sp-load2').hide();
                        $(".loaded-jobs").html('');
                        $('.jobs-j').html(response);
                    }
                });
            });
        </script>
    @endpush

</x-main-layout>
