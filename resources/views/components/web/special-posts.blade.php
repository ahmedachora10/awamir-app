@forelse ($jobs as $job)
    <div class="col-md-8 mx-auto">
        <a href="{{ route('web.jobs.show', $job) }}" class="special-jobs">
            <div class="jobtab position-relative" style="overflow: hidden" style="max-width: 45%;">

                <span class="position-absolute bar important-jobs">رائج</span>

                <div class="sec1 ">
                    <div class="con">
                        <img src="{{ asset('storage/images/jobs/' . $job->image) }}">
                    </div>
                </div>
                <div class="sec2">
                    <h3 class="ps-3">{{ $job->name }} </h3>
                </div>
            </div>
        </a>
    </div>


    @pushOnce('styles')
        <style>
            .special-jobs .con {
                position: unset !important;
                top: unset !important;
            }

            .special-jobs .jobtab .sec1 img {
                width: 39px !important;
                height: 39px !important;
                margin-bottom: 0 !important;
            }

            .special-jobs .jobtab h3 {
                font-size: 15px !important;
            }

            .special-jobs .jobtab {
                width: 95%;
                max-width: 500px;
                display: inline-table;
                margin: 8px;
            }


            element.style {
                overflow: hidden;
            }

            .special-jobs .jobtab {
                width: 95%;
                max-width: 500px;
                display: inline-table;
                margin: 8px;
            }

            @media only screen and (max-width: 700px) .jobtab {
                margin: 20px 0;
            }

            .jobtab {
                width: 95%;
                max-width: 500px;
                background-color: white;
                border-radius: 10px;
                display: inline-table;
                margin: 20px;
                border: 1px solid rgba(192, 192, 192, 0.5);
                box-shadow: rgb(0 0 0 / 16%) 0px 1px 4px;
            }

            @media only screen and (max-width: 750px) {
                .special-jobs .jobtab {
                    margin: 0px 0px 4px 0px !important;
                }
            }
        </style>
    @endPushOnce

@empty
@endforelse
