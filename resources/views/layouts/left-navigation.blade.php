<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">

        <x-admin.medium-card-user />
            <x-admin.link title="Dashboard" icon="home" route="dashboard" />

        {{-- <x-admin.link title="Roles" icon="account-key" route="admin.roles.show" />
        <x-admin.link title="Permissions" icon="key-variant" route="admin.permissions.show" /> --}}


        {{-- <x-admin.link title="Settings" icon="settings" route="admin.settings.show" /> --}}
        {{-- <x-admin.link title="Users" icon="account-multiple" route="admin.users.show" /> --}}
        {{-- <x-admin.dropdown-container title="Levels & Class Rooms" href="school" icon="lan">
            <x-admin.dropdown-menu id="school">
                <x-admin.dropdown-link title="Levels" route="admin.levels.index" />
                <x-admin.dropdown-link title="Classrooms" route="admin.classrooms.index" />
            </x-admin.dropdown-menu>
        </x-admin.dropdown-container> --}}

        {{-- <x-admin.link title="Levels & Class Rooms" icon="lan" route="admin.levels.index" /> --}}



        {{-- <li class="nav-item sidebar-actions">
            <span class="nav-link border-top pt-2 mt-4">
                <x-admin.add-button class="btn-lg btn-gradient-primary mt-4"  href="{{ route('dashboard') }}">
                    + New Product
                </x-admin.add-button>
                <!-- route='dashboard' -->
            </span>
        </li> --}}
    </ul>
</nav>
<!-- partial -->
