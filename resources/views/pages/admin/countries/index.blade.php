<x-app-layout>

    @if (session()->has('success'))
        <h5 class="me-2 mb-2 py-3 btn-inverse-success btn-fw">{{ session()->get('success') }}</h5>
    @endif

    <x-admin.headline title="Countries" icon="folder-google-drive"/>

    <x-admin.table title="All Countries" icon="folder-plus" :route="route('countries.create')"  :columns="['name', 'actions']">
        @forelse($countries as $country)
            <tr>
                <td> {{ $country->name }} </td>
                <td>
                    <div class="d-flex align-items-center">
                        <a href="{{ route('countries.edit', $country->id) }}" style="font-size: 1.2rem" class="mdi mdi-table-edit text-success me-2"></a>
                        {{-- <a href="" style="font-size: 1.2rem" class="mdi mdi-account-remove text-danger"></a> --}}
                        <x-admin.delete-button :route="route('countries.destroy', $country->id)" class="mdi mdi-delete text-danger" />
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td>{{ __('No Countries') }}</td>
            </tr>
        @endforelse
    </x-admin.table>
</x-app-layout>
