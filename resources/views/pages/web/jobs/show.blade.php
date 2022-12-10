<x-main-layout>

    @push('styles')
        <link href=" {{ asset('css/web/home.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('css/web/jobs.css') }}" rel="stylesheet" type="text/css">

        <meta property="og:image" content="{{ asset('storage/images/jobs/' . $job->image) }}">
    @endpush

    @php
        if ($job->jobType->name == 'دوام كلي'):
            $type = 'FULL_TIME';
        elseif ($job->jobType->name == 'دوام جزئي'):
            $type = 'PART_TIME';
        elseif ($job->jobType->name == 'اتفاقية'):
            $type = 'CONTRACTOR';
        elseif ($job->jobType->name == 'مؤقت'):
            $type = 'TEMPORARY';
        elseif ($job->jobType->name == 'تدريب'):
            $type = 'INTERN';
        elseif ($job->jobType->name == 'تطوع'):
            $type = 'VOLUNTEER';
        elseif ($job->jobType->name == 'آخر '):
            $type = 'OTHER';
        else:
            $type = 'OTHER';
        endif;

    @endphp

    @push('head-scripts')
        <script type="application/ld+json">
            {
                "@context": "https://schema.org/",
                "@type": "JobPosting",
                "title": "{{$job->name}}",

                "description": "{{$job->name . '. ' . str(strip_tags($job->description))->limit(100)}}",
                "datePosted": "{{$job->updated_at->format('Y-m-d')}}",
                "employmentType": "{{$type}}",
                "hiringOrganization": {
                    "@type": "Organization",
                    "name": "{{$job->company}}",
                    "logo": "{{ asset('storage/images/jobs/' . $job->image) }}"
                },
                "jobLocation": {
                    "@type": "Place",
                    "address": {
                    "@type": "PostalAddress",
                    "addressLocality": "{{$job->city->name}}",
                    "addressCountry": "{{$job->country->name}}"
                    }
                }
            }
        </script>
    @endpush

    <center>
        <div style="position :relative">
            <div class="main">
                <x-web.social-media-container />

                <div class="my-4">
                    <x-web.special-posts />
                </div>

                <div class="tab mt-5 pt-0">

                    <div class="position-relative overflow-hidden pt-3">
                        @if ($job->created_at >=
                            now()->subDays(2)->format('Y-m-d H:i:s'))
                            <span class="position-absolute bar new-jobs">جديد </span>
                        @elseif($job->created_at >=
                            now()->subDays(14)->format('Y-m-d H:i:s') &&
                            $job->created_at <
                                now()->subDays(2)->format('Y-m-d H:i:s'))
                            <span class="position-absolute bar important-jobs">رائج</span>
                        @endif

                        <div class="sd1">
                            <img src="{{ asset('storage/images/jobs/' . $job->image) }}" />
                        </div>

                        <div class="sd2 ps-3">
                            <h2>{{ $job->name }}</h2>
                            <h3><i class="bi bi-building"></i> &nbsp; {{ $job->company }}</h3>
                        </div>

                        <div class="info">
                            <div class="inf">
                                <i class="bi bi-clock-fill"></i>
                                &nbsp;
                                <div style="display: inline-table;">{{ $job->created_at->diffForHumans() }}</div>
                            </div>
                            <div class="inf">
                                <i class="bi bi-briefcase-fill"></i>
                                {{ $job->jobType->name }}
                            </div>
                            <div class="inf">
                                <i class="bi bi-geo-alt-fill"></i>
                                {{ $job->city->name }}
                            </div>
                        </div>
                    </div>

                    <div class="tab-body">
                        <h3>وصف الوظيفة</h3>
                        <div class="content">
                            {!! $job->description !!}
                        </div>

                        @php
                            $url = route('web.jobs.show', $job->id);
                            $title = $job->name;
                        @endphp
                        <br>


                        <div class="d-flex flex-wrap align-items-center justify-content-center">

                            @if (!empty($job->register_through_awamir))
                                <x-animation-effect>
                                    <a href='{{ $job->register_through_awamir }}' target='_blank'>
                                        <button class="btn_job px-2"
                                            style="background-color:{{ settings('register_through_awamir_bg') }} ;">
                                            <i class="bi bi-whatsapp ms-2"></i>
                                            التسجيل عبر (أوامر توظيف)
                                        </button>
                                    </a>
                                </x-animation-effect>
                            @endif

                            @if (!empty($job->cv))
                                <x-animation-effect>
                                    <a href='{{ $job->cv }}'>
                                        <button class="btn_job" style="background-color:{{ settings('cv_bg') }} ;">
                                            <i class="bi bi-file-earmark-person ms-2"></i>
                                            أطلب سيرة ذاتية
                                        </button>
                                    </a>
                                </x-animation-effect>
                            @endif

                            {{-- 'whatsapp://send?text=*{{$job->title}}* %20%0A رابط التقديم: {{$url}} %20%0A من قروب أوامر توظيف :
                            {{ $variables->where("type" , "social")->where("name", "tel")->first()->content }}' --}}

                            @if (!empty($job->whatsapp))
                                <a
                                    href="whatsapp://send?text=*{{ $job->name }}* %20%0A رابط التقديم: {{ route('web.jobs.show', $job) }} : %20%0A من قروب أوامر توظيف : {{ settings('telegram') }}">
                                    <button class="btn_job"
                                        style="background-color:{{ settings('whatsapp_share_bg') }} ">
                                        <i class="bi bi-whatsapp ms-2"></i> مشاركة عبر واتساب
                                    </button>
                                </a>
                            @endif

                            @if (!empty($job->submission))
                                <a href='{{ $job->submission }}'>
                                    <button class="btn_job" style="background-color : {{ settings('apply_bg') }} ;"> <i
                                            class="bi bi-link-45deg ms-2"></i> رابط التقديم
                                    </button>
                                </a>
                            @endif

                            @if (!empty($job->source))
                                <a href='{{ $job->source }}'>
                                    <button class="btn_job" style="background-color:{{ settings('source_bg') }} ;">
                                        <i class="bi bi-folder-symlink ms-2"></i>
                                        المصدر
                                    </button>
                                </a>
                            @endif

                        </div>

                    </div>

                    {{-- <div id="share">
                        <h4><i class="bi bi-people-fill"></i> شارك الخبر ليتسفيد الجميع </h4>
                        <!-- twitter -->
                        <a class="twitter"
                            href="https://twitter.com/intent/tweet?status={{ $title }}+{{ $url }}"
                            target="blank"><i class="bi bi-twitter"></i></a>
                        <!-- whatsapp -->
                        <a style='background-color:#25D366'
                            href="whatsapp://send?text= {{ $title }} - {{ $url }}" target='_blank'><i
                                class="bi bi-whatsapp"></i></a>
                        <!-- telegram -->
                        <a style='background-color:rgb(53, 157, 218)'
                            href="https://t.me/share/url?url={{ $url }}&text={{ $title }}"
                            target="blank"><i class="bi bi-telegram"></i></a>
                    </div> --}}

                    {{-- Join us on Whatsapp Group --}}
                    @includeIf('partials.join-us')
                </div>


            </div>
            <div class="side">
                <br>
                <h4 style="font-size: 18px;margin:10px 0 ;">وظائف قد تعجبك</h4>
                @foreach ($relatedJobs as $related)
                    <x-web.job-card :job="$related" />
                @endforeach
            </div>
        </div>
    </center>

</x-main-layout>
