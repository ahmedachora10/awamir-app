<x-app-layout>

    <x-admin.headline title="Users" icon="account-multiple"/>

    @php
        $column = ['image', 'name', 'الدور', 'actions'];
    @endphp

    <x-admin.table title="All Users" :route="route('users.create')" :columns="$column">
        {{-- <livewire:show-users /> --}}
        @forelse($users as $user)
            <tr>
                <td>
                    <img src="{{ asset($user->avatar) }}" class="me-2" alt="{{ $user->name }}">
                </td>
                <td class="fw-bold"> {{ $user->name }} </td>

                <td>
                    @if($user->roles->count() > 0)
                        <label class="badge fw-bold badge-gradient-{{ $user->roles->first()->name == 'admin' ? 'danger' : ($user->roles->first()->name == 'writer' ? 'info' : 'primary') }}">
                            {{ __(strtoupper($user->roles->first()->name)) }}
                        </label>
                    @endif
                </td>

                <td>
                    <div class="d-flex align-items-center">
                        <a href="{{ route('users.edit', $user->id) }}" style="font-size: 1.2rem" class="mdi mdi-account-settings text-success me-2"></a>
                        <x-admin.delete-button :route="route('users.destroy', $user->id)" class="mdi mdi-account-remove text-danger" />
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td>No Users</td>
            </tr>
        @endforelse
    </x-admin.table>
    {{-- {{ $users->links() }} --}}
</x-app-layout>
