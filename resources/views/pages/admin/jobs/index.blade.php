<x-app-layout>

    @if (session()->has('success'))
        <h5 class="me-2 mb-2 py-3 btn-inverse-success btn-fw">{{ session()->get('success') }}</h5>
    @endif

    <x-admin.headline title="Jobs" icon="folder-google-drive"/>

    <x-admin.table title="All Jobs" icon="folder-plus" :route="route('jobs.create')"  :columns="['name', 'actions']">
        @forelse($jobs as $job)
            <tr>
                <td> {{ $job->name }} </td>
                <td>
                    <div class="d-flex align-items-center">
                        <a href="{{ route('jobs.edit', $job->id) }}" style="font-size: 1.2rem" class="mdi mdi-table-edit text-success me-2"></a>
                        {{-- <a href="" style="font-size: 1.2rem" class="mdi mdi-account-remove text-danger"></a> --}}
                        <x-admin.delete-button :route="route('jobs.destroy', $job->id)" class="mdi mdi-delete text-danger" />
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
