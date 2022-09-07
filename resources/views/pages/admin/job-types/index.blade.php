<x-app-layout>

    <x-admin.headline title="Job Types" icon="folder-google-drive"/>

    <x-admin.table title="All Job Types" icon="folder-plus" :route="route('job-types.create')"  :columns="['name', 'actions']">
        @forelse($types as $type)
            <tr>
                <td> {{ $type->name }} </td>
                <td>
                    <div class="d-flex align-items-center">
                        <a href="{{ route('job-types.edit', $type->id) }}" style="font-size: 1.2rem" class="mdi mdi-table-edit text-success me-2"></a>
                        {{-- <a href="" style="font-size: 1.2rem" class="mdi mdi-account-remove text-danger"></a> --}}
                        <x-admin.delete-button :route="route('job-types.destroy', $type->id)" class="mdi mdi-delete text-danger" />
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td>{{ __('لا توجد عناصر لعرضها') }}</td>
            </tr>
        @endforelse
</x-admin.table>
</x-app-layout>
