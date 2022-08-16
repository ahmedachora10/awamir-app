@if($value !== 0)
    <div class="col-md-4 stretch-card grid-margin">
        <div class="card {{ $bg }} card-img-holder text-white">
            <div class="card-body">
                <img src="{{ asset('images/dashboard/circle.svg') }}" class="card-img-absolute" alt="circle-image">
                <h4 class="font-weight-normal mb-3">{{ __($title) }} <i class="mdi mdi-{{ $icon }} mdi-24px float-right"></i>
                </h4>
                <h2 class="mb-5">{{ $value }}</h2>
                <h6 class="card-text">{{ $slot }}</h6>
            </div>
        </div>
    </div>
@endif