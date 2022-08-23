<x-app-layout>

    @if (session()->has('success'))
        <h5 class="me-2 mb-2 py-3 btn-inverse-success btn-fw">{{ session()->get('success') }}</h5>
    @endif

    <x-admin.headline title="Cities" icon="folder-google-drive"/>

    <x-admin.table title="All Cities" icon="folder-plus" :route="route('cities.create')"  :columns="['name', 'country', 'actions']">
        @forelse($cities as $city)
            <tr>
                <td> {{ $city->name }} </td>
                <td> {{ $city->country->name }} </td>
                <td>
                    <div class="d-flex align-items-center">
                        <a href="{{ route('cities.edit', $city->id) }}" style="font-size: 1.2rem" class="mdi mdi-table-edit text-success me-2"></a>
                        {{-- <a href="" style="font-size: 1.2rem" class="mdi mdi-account-remove text-danger"></a> --}}
                        <x-admin.delete-button :route="route('cities.destroy', $city->id)" class="mdi mdi-delete text-danger" />
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td>{{ __('No Cities') }}</td>
            </tr>
        @endforelse
</x-admin.table>
</x-app-layout>
