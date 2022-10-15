<div>

    <x-admin.table title="All Cities" icon="folder-plus" :route="route('cities.create')" :columns="['name', 'country', 'actions']">
        @forelse($cities as $city)
            <tr>
                <td> {{ $city->name }} </td>
                <td> <label class="badge fw-bold badge-gradient-info"> {{ $city->country->name }} </label> </td>
                <td>
                    <div class="d-flex align-items-center">
                        <a href="{{ route('cities.edit', $city->id) }}" style="font-size: 1.2rem"
                            class="mdi mdi-table-edit text-success me-2"></a>
                        {{-- <a href="" style="font-size: 1.2rem" class="mdi mdi-account-remove text-danger"></a> --}}
                        <x-admin.delete-button :route="route('cities.destroy', $city->id)" class="mdi mdi-delete text-danger" />
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td>{{ __('لا توجد مدن لعرضها') }}</td>
            </tr>
        @endforelse
    </x-admin.table>

    {{ $cities->links() }}

</div>
