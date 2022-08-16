<li class="nav-item">
    <a {{ $attributes->merge(['class' => 'nav-link']) }} href="{{ route($route) }}">
        <span class="menu-title fw-bold">{{ __($title) }}</span>
        <i class="mdi mdi-{{ $icon }} menu-icon"></i>
    </a>
</li>