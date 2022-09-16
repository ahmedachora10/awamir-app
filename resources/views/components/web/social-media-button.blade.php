@if(!is_null(settings($media)))
    <a
        href="{{ settings($media) }}"
        target="_blank"
        {{ $attributes->merge([
            'class' => 'hbtn d-inline-block',
            'style' => 'background-color :' . settings($media . '_bg') ?? $background . ';'
        ]) }}>
            {{ $slot }}
    </a>
@endif
