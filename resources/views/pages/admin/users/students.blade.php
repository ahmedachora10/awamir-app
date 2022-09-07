<x-app-layout>

    @if (session()->has('success'))
        <h5 class="me-2 mb-2 py-3 btn-inverse-success btn-fw">{{ session()->get('success') }}</h5>
    @endif

    <x-admin.headline title="Users" icon="account-multiple"/>

    @php
        $columns = ['image', 'name', 'role', 'levels', 'دخول', 'join at', 'actions'];
    @endphp


    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <div class="row justify-content-between align-items-center">

                    {{-- <input type="text" class="form-control py-1" style="width:200px" name="search"> --}}
                    <form action="{{ route('admin.users.students') }}" method="get" class="col-md-10 col-12">
                        <div class="input-group" id="search-container">
                            <input type="text" class="form-control py-1" name="search" value="{{ request('search') }}" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-sm btn-gradient-primary" type="submit">Search</button>
                            </div>
                        </div>

                    </form>


                    <div class="col-md-2 col-12">
                        <x-admin.add-button class="btn-sm btn-gradient-primary" id="create-btn" href="{{ route('admin.users.create') }}">
                            <i class="mdi mdi-account-plus"></i>
                        </x-admin.add-button>
                    </div>

                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                @foreach ($columns as $col)
                                    <th>{{ __(ucwords($col)) }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td>
                                        <img src="{{ asset($user->avatar) }}" class="me-2" alt="{{ $user->name }}">
                                    </td>
                                    <td> {{ $user->name }} </td>
                                    <td>
                                        @if($user->roles_count > 0)
                                            <label class="badge fw-bold badge-gradient-{{ $user->roles->first()->name == 'admin' ? 'danger' : ($user->roles->first()->name == 'teacher' ? 'info' : 'primary') }}">
                                                {{ __(strtoupper($user->roles->first()->name)) }}
                                            </label>
                                        @endif
                                    </td>

                                    <td>
                                        @if($user->levels_count > 0)
                                            @forelse ($user->levels as $level)
                                            <label class="badge fw-bold badge-gradient-success">
                                                {{ __(strtoupper($level->name)) }}
                                            </label>

                                            @empty

                                            @endforelse
                                        @endif
                                    </td>

                                    <td>
                                        <a href="{{ route('admin.users.student.account') }}?id={{ $user->id }}"
                                        class="badge fw-bold badge-gradient-danger border-0">
                                            الدخول للحساب
                                        </a>
                                    </td>

                                    <td> {{ $user->created_at->diffForHumans() }} </td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('admin.users.edit', $user->id) }}" style="font-size: 1.2rem" class="mdi mdi-account-settings text-success me-2"></a>
                                            <x-admin.delete-button :route="route('admin.users.delete', $user->id)" class="mdi mdi-account-remove text-danger" />
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>No Users</td>
                                </tr>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
{{ $users->links() }}

@push('style')
    <style>
        #search-container {
            width: 300px
        }

        @media (max-width: 767px) {
            #search-container {
                width: 100%
            }

            #create-btn {
                float: right;
                margin-top: 10px;
            }
        }
    </style>
@endpush

</x-app-layout>
