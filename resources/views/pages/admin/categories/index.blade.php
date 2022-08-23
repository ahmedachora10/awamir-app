<x-app-layout>

    @if (session()->has('success'))
        <h5 class="me-2 mb-2 py-3 btn-inverse-success btn-fw">{{ session()->get('success') }}</h5>
    @endif

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
