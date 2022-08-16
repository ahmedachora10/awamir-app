<li class="nav-item">
    <a class="nav-link fw-bold" data-bs-toggle="collapse" href="#{{$href}}" 
    aria-expanded="true" aria-controls="{{$href}}">
      <span class="menu-title">{{ __($title) }}</span>
      <i class="menu-arrow"></i>
      <i class="mdi mdi-{{ $icon }} menu-icon"></i>
    </a>
    {{ $slot }}
  </li>