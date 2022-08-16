<li class="nav-item nav-profile dropdown">
    <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
        <div class="nav-profile-img">
            <img src="{{ auth()->user()->avatar }}" alt="{{ auth()->user()->name }}">
            <span class="availability-status online"></span>
        </div>
        <div class="nav-profile-text">
            <p class="mb-1 text-black">{{ auth()->user()->name }}</p>
        </div>
    </a>
    <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
        <a class="dropdown-item" href="#">
            <i class="mdi mdi-cached me-2 text-success"></i> Activity Log </a>
        <div class="dropdown-divider"></div>

        <x-admin.logout-button class="dropdown-item">
            <i class="mdi mdi-logout me-2 text-primary"></i> {{ __('Signout') }}
        </x-admin.logout-button>
    </div>
</li>
