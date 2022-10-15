<div>

    <x-admin.input type="search" wire:keydown.debounce.500ms="filter" wire:model="search" name="search"
        placeholder="البحث" class="rounded" />

    <x-admin.table title="كل الوظائف" icon="folder-plus" :route="route('jobs.create')" :columns="['name', 'الدولة - المدينة', 'الفئة', 'الزيارات', 'الحالة', 'تاريح الاظافة', 'actions']">

        @forelse($jobs as $job)
            <tr>
                <td title="{{ $job->name }}">
                    @if (strlen($job->name) > 60)
                        {{ substr($job->name, 0 * 2, 60 * 2) }} ...
                    @else
                        {{ $job->name }}
                    @endif
                </td>
                <td title="{{ $job->country->name }} - {{ $job->city->name }}">
                    <label class="badge fw-bold badge-gradient-primary">
                        {{ $job->country->name }} -
                        @if (strlen($job->city->name) > 15)
                            {{ substr($job->city->name, 0 * 2, 15 * 2) }} ...
                        @else
                            {{ $job->city->name }}
                        @endif
                        {{-- {{ $job->city->name }} --}}
                    </label>
                </td>
                <td> <label class="badge fw-bold badge-gradient-info">{{ $job->category->name }}</label> </td>
                <td> {{ $job->views }} </td>
                <td class="change-status" data-id="{{ $job->id }}" style="cursor: pointer">
                    @if ($job->status == App\Http\Helpers\PostStatus::PUBLISH->value)
                        <label class="badge badge-info">منشور</label>
                    @else
                        <label class="badge badge-danger fw-bold">مسودة</label>
                    @endif
                </td>

                <td>{{ $job->created_at->diffForHumans() }}</td>

                <td>
                    <div class="d-flex align-items-center">
                        <a href="{{ route('web.jobs.show', $job) }}" target="_blank" style="font-size: 1.2rem"
                            class="mdi mdi-eye text-primary ms-2"></a>
                        <a href="{{ route('jobs.edit', $job->id) }}" style="font-size: 1.2rem"
                            class="mdi mdi-table-edit text-success ms-2"></a>
                        {{-- <a href="" style="font-size: 1.2rem" class="mdi mdi-account-remove text-danger"></a> --}}
                        <x-admin.delete-button :route="route('jobs.destroy', $job->id)" class="mdi mdi-delete text-danger" />
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td>{{ __('لا توجد وظائف لعرضها') }} - {{ $search }}</td>
            </tr>
        @endforelse
    </x-admin.table>

    {{ $jobs->links() }}

</div>
