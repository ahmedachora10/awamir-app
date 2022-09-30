<!-- partial:partials/_sidebar.html -->
<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">

        <x-admin.medium-card-user />
            @role('admin')
                <x-admin.link title="للوحة تحكم" icon="home" route="dashboard" />
                <x-admin.link title="المستخدمين" icon="account-multiple" route="users.index" />
                {{-- <x-admin.link title="أنواع الوظائف" icon="format-list-bulleted" route="categories.index" /> --}}
                <x-admin.link title="الدول" icon="map-marker-multiple" route="countries.index" />
                <x-admin.link title="المدن" icon="city" route="cities.index" />
                <x-admin.link title="المشتركين" icon="account-multiple-plus" route="subscribers.index" />
            @endrole

            @role('admin|writer')
                {{-- <x-admin.link title="الوظائف" icon="lan" route="jobs.index" />
                <x-admin.link title="انواع الوظائف" icon="lan" route="job-types.index" /> --}}

                <x-admin.dropdown-container title="الوظائف" href="jobs" icon="wallet-travel">
                    <x-admin.dropdown-menu id="jobs">
                        <x-admin.dropdown-link title="الوظائف" route="jobs.index" />
                        <x-admin.dropdown-link title="الفئات" route="categories.index" />
                        <x-admin.dropdown-link title="لانواع" route="job-types.index" />
                    </x-admin.dropdown-menu>
                </x-admin.dropdown-container>

            @endrole


            @role('admin')
                <x-admin.link title="الاعلانات" icon="bell-ring" route="ads.index" />
                <x-admin.link title="الاعدادات" icon="settings-box" route="settings.index" />
            @endrole

                {{-- <x-admin.link title="Permissions" icon="key-variant" route="admin.permissions.show" /> --}}


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
