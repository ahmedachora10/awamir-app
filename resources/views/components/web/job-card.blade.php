<a href="{{ route('web.jobs.show', $job) }}">
    <div class="jobtab position-relative" style="overflow: hidden" style="max-width: 45%;">

        @if ($job->created_at >=
            now()->subDays(2)->format('Y-m-d H:i:s') && $status == 'new')
            <span class="position-absolute bar new-jobs">جديد </span>
        @elseif($job->created_at >=
            now()->subDays(14)->format('Y-m-d H:i:s') &&
            $job->created_at <
                now()->subDays(2)->format('Y-m-d H:i:s') &&
            $status == 'important')
            <span class="position-absolute bar important-jobs">رائج</span>
        @endif

        <div class="sec1 ">
            <div class="con">
                <img src="{{ asset('storage/images/jobs/' . $job->image) }}">
            </div>
        </div>
        <div class="sec2">
            <h3 class="ps-3">{{ $job->name }} </h3>
            <div class="company">{{ $job->company }}</div>
            <p>{{ Str::limit(Str::replace('&nbsp;', ' ', strip_tags($job->description)), 65, ' ...') }}</p>
        </div>
    </div>
</a>
