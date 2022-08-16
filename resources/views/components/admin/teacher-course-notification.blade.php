<a class="dropdown-item preview-item">
    <div class="preview-thumbnail">
        <div class="preview-icon bg-success">
            @if($image)
                <img src="{{ $image }}" alt="">
            @endif
            @if($icon)
                <i class="{{ $icon }}"></i>
            @endif
        </div>
    </div>
    <div class="preview-item-content d-flex align-items-start flex-column justify-content-center">
        <h6 class="preview-subject font-weight-normal mb-1">{{ $title }}</h6>
        <p class="text-gray ellipsis mb-0" title="{{ $message }}"> {{ $message }} </p>
    </div>
</a>