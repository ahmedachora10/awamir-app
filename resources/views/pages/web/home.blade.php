<x-main-layout>

    @push('styles')
        <link href=" {{ asset('css/web/home.css') }}" rel="stylesheet" type="text/css">
    @endpush

    <div class="main text-center">
        <center>
            <form action="/jobs" method="get">
                <div style="position: relative;width:95%" class="mx-auto">
                    <div class="search">
                        <input type="search" name="squery" class="squery"
                            placeholder="ابحث عن الوظيفة المناسبة " /><button type="submit"><i
                                class="bi bi-search"></i></button>
                    </div>
                    <div class="dropsearch"></div>
                </div>
            </form>
            <x-web.social-media-container />
        </center>
    </div>

    <div class="mt-5 pt-4 mb-4">
        <center>
            <x-web.special-posts />
        </center>
    </div>

    <div class="main2 mt-4">
        <center>
            <h2>تصفح الوظائف</h2>
            <div class="cat cat1 cat-act">
                <div class='ico'><i class="bi bi-clock-fill"></i></div> أحدث الوظائف
            </div>
            <div class="cat cat2">
                <div class='ico'><i class="bi bi-lightning-charge-fill"></i></div> أهم الوظائف
            </div>
            <div class="new-job">
                @foreach ($latestJobs as $job)
                    <x-web.job-card :job="$job" status="new" />
                @endforeach
                <br>
                <a href='/jobs'><button class="more">وظائف اكثر .</button></a>
            </div>
            <div class="imp-job">
                @foreach ($importantJobs as $job)
                    <x-web.job-card :job="$job" status="important" />
                    {{-- <a href="{{ route('web.jobs.show', $job) }}"><div class="jobtab">
                <div class="sec1 ">
                    <div class="con">
                      <img src="{{ asset($job->image) }}" >
                    </div>
                </div>
                <div class="sec2">
                    <h3>{{$job->name}} </h3>
                    <div class="company">{{$job->company}}</div>
                    <p>{{Str::limit(Str::replace('&nbsp;', ' ', strip_tags($job->description)), 65, ' ...');}}</p>
                </div>

            </div></a> --}}
                @endforeach
                <br>
                <a href='/jobs'><button class="more">وظائف اكثر ...</button></a>
            </div>
        </center>
    </div>

    <div class="main3">
        <center>
            <h2>وظائف حسب الاقسام</h2><br>
            @foreach ($categories as $category)
                <a href="{{ route('web.jobs.index') }}?category={{ $category->id }}">
                    <div class="categorie">{{ $category->name }}</div>
                </a>
            @endforeach
        </center>
    </div>
    <div class="main4">
        <center>
            <div class="side1">
                <img src="{{ asset('images/web/resume.svg') }}" />
            </div>
            <div class="side2">
                <h3>اطلب سيرتك الذاتية</h3>
                <p>سيرة ذاتية احترافية بأقل الاثمان</p>
                <a href="/resume-services"><button>اطلبها الآن</button></a>
            </div>
        </center>
    </div>

    @push('styles')
        <style>

        </style>
    @endpush

    @push('scripts')
        <script>
            if ($('.squery').length) {

                $('.squery').keyup(function() {
                    var squery = $('.squery').val();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                        }
                    });

                    $.ajax({
                        method: 'get',
                        url: "{{ route('web.jobs.filter') }}",
                        data: {
                            squery: squery
                        },
                        success: function(data) {
                            console.log(data);
                            if (squery == '') {
                                $('.dropsearch').fadeOut('slow');
                            } else {
                                var result = '';
                                var result2 = '<div class="dropsearch-bot">';
                                $('.dropsearch').fadeIn('slow');
                                if (!data.length) {

                                    result +=
                                        '<div class="search-q" onclick="show(this.innerHTML)">لا شيء مطابق</div>';
                                    $('.dropsearch').html(result);

                                } else {

                                    const length = data.length > 4 ? 4 : data.length;

                                    for (let i = 0; i < length; i++) {
                                        var dd = data[i].name;
                                        result += '<div class="search-q" onclick="show(this)" id="' + dd
                                            .substring(0, 15) + '"><i class="bi bi-search"></i>' + dd
                                            .substring(0, 15) + ' ...</div> ';
                                        result2 += '<div class="search-c" id="' + data[i].category.id +
                                            '" onclick="show2(this)">' + data[i].category.name + '</div>';
                                    }
                                    result2 += '</div>';
                                    $('.dropsearch').html(result + result2);
                                }
                            }
                        }
                    });
                });

            }

            // onclick query show on search input
            function show(cl) {
                $('.squery').val(cl.id);
                $('.dropsearch').hide();
            }

            function show2(cl) {
                $('.squery').val(cl.id);
                $('.dropsearch').hide();
            }
        </script>
    @endpush

</x-main-layout>
