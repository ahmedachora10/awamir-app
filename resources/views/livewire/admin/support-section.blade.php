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
                <button type="button" wire:click="{{ $eventName }}" class="btn btn-primary mt-2">حفظ</button>
            </div>
        </form>
    </x-admin.sample-card>

    <div class="col-12 grid-margin support-container">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="card-title">{{ __(' روابط التسجيل في أوامر') }}</h4>
                    <x-admin.add-button class="btn-sm btn-gradient-primary" href="javascript:void(0);"
                        wire:click="create">
                        <i class="mdi mdi-folder-plus"></i>
                    </x-admin.add-button>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                @foreach (['الرابط', ' الوقت ', '', 'actions'] as $col)
                                    <th>{{ __(ucwords($col)) }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($supports as $support)
                                <tr>
                                    <td title="{{ $support->content }}">
                                        <label class="badge fw-bold badge-gradient-primary">
                                            {{ substr($support->content, 0, 50) }}...
                                        </label>
                                    </td>

                                    <td>
                                        <label class="badge fw-bold badge-gradient-info">
                                            @if (!is_null($support->time) || !empty($support->time))
                                                {{ $support->time }}
                                            @else
                                                --
                                            @endif
                                        </label>
                                    </td>

                                    <td>
                                        <a href="javascript:void(0);" wire:click="apply({{ $support->id }})"
                                            class="badge fw-bold badge-gradient-success" style="cursor: pointer">
                                            تفعيل
                                        </a>
                                    </td>

                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a style="font-size: 1.2rem" class="mdi mdi-table-edit text-success ms-2"
                                                wire:click="edit({{ $support->id }})" data-bs-toggle="modal"
                                                data-bs-target="#support-modal-edit"></a>
                                            <a href="javascript:void(0);" style="font-size: 1.2rem"
                                                class="mdi mdi-delete text-danger"
                                                onclick="if(confirm('هل تود حذف هذا العنصر؟')) ? true : false"
                                                wire:click="destroy({{ $support->id }})"></a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>{{ __('لا توجد روابط التسجيل لعرضها') }}</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>
