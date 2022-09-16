@forelse ($jobs as $job)
    <x-web.job-card :job="$job" />
@empty
    <img style='max-width: 80%;' src='{{ asset("images/web/no-result.png") }}' /><br>
    <span style="font-size: 15px ;margin:10px 0;">لم يعد البحث بأي نتائج</span>
@endforelse

@if ($jobs->count() < 8 )
    <style>
    .more{display:none !important}
    </style>
@else
    <style>
        .more{display:block !important}
    </style>
@endif
