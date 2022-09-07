<x-app-layout>

    <x-admin.headline title="الاعلانات" icon="folder-google-drive"/>

    <x-admin.table title="جميع الاعلانات" icon="folder-plus" :route="route('ads.create')"  :columns="['name', 'actions']">
        @forelse($ads as $ad)
            <tr>
                <td> {{ $ad->name }} </td>
                <td>
                    <div class="d-flex align-items-center">
                        <a href="{{ route('ads.edit', $ad->id) }}" style="font-size: 1.2rem" class="mdi mdi-table-edit text-success me-2"></a>
                        {{-- <a href="" style="font-size: 1.2rem" class="mdi mdi-account-remove text-danger"></a> --}}
                        <x-admin.delete-button :route="route('ads.destroy', $ad->id)" class="mdi mdi-delete text-danger" />
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td>{{ __('لا توجد اعلانات لعرضها') }}</td>
            </tr>
        @endforelse
</x-admin.table>
</x-app-layout>
