<li class="nav-item nav-profile">
    <a href="#" class="nav-link">
        <div class="nav-profile-image">
            <img src="{{ auth()->user()->avatar }}" alt="profile">
            <span class="login-status online"></span>
            <!--change to offline or busy as needed -->
        </div>
        <div class="nav-profile-text d-flex flex-column">
            <span class="font-weight-bold mb-2">{{ auth()->user()->name }}</span>
            <span class="text-secondary text-small">{{ __(auth()->user()->roles->first()->display_name) }}</span>
        </div>
        <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
    </a>
</li>