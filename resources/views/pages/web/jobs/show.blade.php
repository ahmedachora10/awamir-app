<x-main-layout>

    @push('styles')
        <link href=" {{ asset('css/web/home.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/web/jobs.css') }}" rel="stylesheet" type="text/css">
    @endpush

    <center>
        <div style="position :relative" >
            <div class="main" >
                <x-web.social-media-container />

                <div class="tab mt-5">

                    <div class="sd1">
                        <img src="{{ asset('storage/images/jobs/' . $job->image) }}" />
                    </div>

                    <div class="sd2">
                        <h2>{{$job->name}}</h2>
                        <h3><i class="bi bi-building"></i> &nbsp; {{$job->company}}</h3>
                    </div>

                    <div class="info">
                        <div class="inf">
                            <i class="bi bi-clock-fill"></i>
                            &nbsp;
                            <div style="display: inline-table;" >{{ $job->created_at->diffForHumans() }}</div>
                        </div>
                        <div class="inf">
                            <i class="bi bi-briefcase-fill"></i>
                            {{$job->jobType->name}}
                        </div>
                        <div class="inf">
                            <i class="bi bi-geo-alt-fill"></i>
                            {{$job->city->name}}
                        </div>
                    </div>

                    <div class="tab-body">
                        <h3>وصف الوظيفة</h3>
                        <div class="content">
                        {!! $job->description !!}
                        </div>

                        @php
                            $url  = route('web.jobs.show', $job->id);
                            $title = $job->name ;
                        @endphp
                        <br>


                        @if (!empty($job->register_through_awamir))
                            <a href='{{$job->register_through_awamir}}' target='_blank'><button class="btn_job" style="background-color:{{ settings('register_through_awamir_bg') }} ;">تسجيل عبر الواتساب  <i class="bi bi-whatsapp"></i></button></a>
                        @endif

                        @if (!empty($job->cv))
                            <a href='{{$job->cv}}'><button class="btn_job" style="background-color:{{ settings('cv_bg') }} ;"> أطلب سيرة ذاتية<i class="bi bi-file-earmark-person"></i> </button></a>
                        @endif

                        @if (!empty($job->whatsapp))
                            <a href='whatsapp://send?text= {{$job->name}} - {{ route('web.jobs.show', $job) }}  '>
                                <button class="btn_job" style="background-color:{{ settings('whatsapp_share_bg') }}" >
                                    <i class="bi bi-whatsapp"></i> تسجيل عبر واتساب
                                </button>
                            </a>
                        @endif

                        @if (!empty($job->submission))
                            <a href='{{$job->submission}}'><button class="btn_job" style="background-color : {{ settings('apply_bg') }} ;" > <i class="bi bi-link-45deg"></i> رابط التقديم  </button></a>
                        @endif

                        @if (!empty($job->source))
                            <a href='{{$job->source}}'><button class="btn_job" style="background-color:{{ settings('source_bg') }} ;">المصدر <i class="bi bi-folder-symlink"></i></button></a>
                        @endif


                    </div>

                    <div id="share">
                        <h4><i class="bi bi-people-fill"></i>  شارك الخبر ليتسفيد الجميع  </h4>
                        <!-- twitter -->
                        <a class="twitter" href="https://twitter.com/intent/tweet?status={{$title}}+{{$url}}" target="blank"><i class="bi bi-twitter"></i></a>
                        <!-- whatsapp -->
                        <a style='background-color:#25D366' href="whatsapp://send?text= {{$title}} - {{$url}}" target='_blank'><i class="bi bi-whatsapp"></i></a>
                        <!-- telegram -->
                        <a style='background-color:rgb(53, 157, 218)'  href="https://t.me/share/url?url={{$url}}&text={{$title}}" target="blank"><i class="bi bi-telegram"></i></a>
                    </div>

                </div>

            </div>
        <div class="side">
          <br>
          <h4 style="font-size: 18px;margin:10px 0 ;">وظائف قد تعجبك</h4>
          @foreach ($relatedJobs as $related)
            <a href="{{ route('web.jobs.show', $related) }}"><div class="jobtab" style="width:95% !important ;margin: 20px 0;display: block;">
                <div class="sec1 ">
                    <div class="con">
                        <img src="{{ asset('storage/images/jobs/' . $related->image) }}" >
                    </div>
                </div>
                <div class="sec2">
                    <h3>{{$related->name}} </h3>
                    <div class="company">{{$related->company}}</div>
                    <p>{{Str::limit(Str::replace('&nbsp;', ' ', strip_tags($related->description)),65 , ' ...');}}</p>
                </div>
                </div>
                </a>
          @endforeach
        </div>
      </div>
      </center>

</x-main-layout>