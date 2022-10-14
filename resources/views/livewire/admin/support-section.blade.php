<div>
    <x-admin.message />

    <x-admin.sample-card :class="$open ? 'd-block' : 'd-none'">
        <h5 class="card-title mb-4">رابط جديد</h5>
        <form class="row algin-items-center">
            <div class="form-group col-md-6 col-12 mb-2">
                <x-admin.input type="text" wire:model.defer="content" placeholder="رابط التسجيل" />
                @error('content')
                    <span class="text-danger d-block mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-md-6 col-12 mb-2">
                <x-admin.input type="time" wire:model.defer="time" placeholder="وقت الدوام" />
                @error('time')
                    <span class="text-danger d-block mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="col-12">
                {{-- @if ($eventName == 'update') --}}
                <button type="button" wire:click="{{ $eventName }}" class="btn btn-primary mt-2">حفظ</button>
                {{-- @else
                    <button type="button" wire:click="store" class="btn btn-primary mt-2">حفظ</button>
                @endif --}}
            </div>
        </form>
    </x-admin.sample-card>

    <x-admin.table title=" روابط التسجيل في أوامر" route="javascript:void();" icon="folder-plus" :columns="['الرابط', ' الوقت ', '', 'actions']"
        cls="support-container">
        <a id="save-support" wire:click="create" class="d-none">add</a>
        @forelse($supports as $support)
            <tr>
                <td title="{{ $support->content }}">
                    <label class="badge fw-bold badge-gradient-primary">
                        {{ substr($support->content, 0, 50) }}...
                    </label>
                </td>

                <td>
                    <label class="badge fw-bold badge-gradient-info">
                        {{ $support->time }}
                    </label>
                </td>

                <td>
                    <a href="javascript:void();" wire:click="apply({{ $support->id }})"
                        class="badge fw-bold badge-gradient-success" style="cursor: pointer">
                        تفعيل
                    </a>
                </td>

                <td>
                    <div class="d-flex align-items-center">
                        <a href="javascript:void();" style="font-size: 1.2rem"
                            class="mdi mdi-table-edit text-success ms-2" wire:click="edit({{ $support->id }})"
                            data-bs-toggle="modal" data-bs-target="#support-modal-edit"></a>
                        <a href="javascript:void();" style="font-size: 1.2rem" class="mdi mdi-delete text-danger"
                            wire:click="destroy({{ $support->id }})"
                            onclick="if(confirm('هل تود حذف هذا العنصر؟')) { event.preventDefault();
                    this.closest('form').submit();} else { return false }"></a>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td>{{ __('لا توجد روابط التسجيل لعرضها') }}</td>
            </tr>
        @endforelse

    </x-admin.table>

</div>

@pushOnce('scripts')
    <script>
        if ($('.support-container').length) {
            if ($('.support-container a.btn').length) {
                $('.support-container a.btn').click(function() {
                    document.querySelector('#save-support').click();
                });
            }
        }
    </script>
@endPushOnce
