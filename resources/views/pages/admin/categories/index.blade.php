<x-app-layout>

    <x-admin.headline title="Categories" icon="folder-google-drive"/>

    <x-admin.table title="All Categories" icon="folder-plus" :route="route('categories.create')"  :columns="['name', 'actions']">
        @forelse($categories as $category)
            <tr>
                <td> {{ $category->name }} </td>
                <td>
                    <div class="d-flex align-items-center">
                        <a href="{{ route('categories.edit', $category->id) }}" style="font-size: 1.2rem" class="mdi mdi-table-edit text-success me-2"></a>
                        {{-- <a href="" style="font-size: 1.2rem" class="mdi mdi-account-remove text-danger"></a> --}}
                        <x-admin.delete-button :route="route('categories.destroy', $category->id)" class="mdi mdi-delete text-danger" />
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td>{{ __('No Categories') }}</td>
            </tr>
        @endforelse
</x-admin.table>
</x-app-layout>
