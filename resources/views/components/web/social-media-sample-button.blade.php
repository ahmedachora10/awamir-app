@if(!is_null(settings($media)))
    <a
        href="{{ settings($media) }}"
        target="_blank"
        {{ $attributes }}>
            <i class="bi bi-{{ $media }}"></i>
    </a>
@endif
