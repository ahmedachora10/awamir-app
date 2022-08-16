<div {{ $attributes->merge(['class' => 'collapse']) }}>
    <ul class="nav flex-column sub-menu">
        {{ $slot }}
    </ul>
  </div>