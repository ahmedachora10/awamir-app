<div>
    <x-admin.message />

    <x-admin.sample-card :class="$open ? 'd-block' : 'd-none'">
        <h5 class="card-title mb-4">رابط جديد</h5>
        <form class="row algin-items-center">
            {{-- <x-admin.input type="text" wire:model="type" /> --}}

            <div class="form-group col-md-6 col-12 mb-2">
                <x-admin.select-input wire:model.defer="type">
                    <option>نوع المنصة</option>
                    @foreach (App\Http\Helpers\SocialMediaType::cases() as $media)
                        <option value="{{ $media->value }}">{{ $media->name() }}</option>
                    @endforeach
                </x-admin.select-input>
                @error('type')
                    <span class="text-danger d-block mt-2">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-md-6 col-12 mb-2">
                <x-admin.input type="text" wire:model.defer="link" placeholder="الرابط" />
                @error('link')
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
                    <h4 class="card-title">{{ __('مواقع التواصل الاجتماعية') }}</h4>
                    <x-admin.add-button class="btn-sm btn-gradient-primary" href="javascript:void(0);"
                        wire:click="create">
                        <i class="mdi mdi-folder-plus"></i>
                    </x-admin.add-button>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                @foreach (['المنصة', 'الرابط', ' الوقت ', '', 'actions'] as $col)
                                    <th>{{ __(ucwords($col)) }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($socialMedia as $media)
                                <tr>
                                    <td>
                                        <label class="badge fw-bold badge-gradient-info">
                                            {{ $media->type->name() }}
                                        </label>
                                    </td>
                                    <td title="{{ $media->link }}">
                                        <label class="badge fw-bold badge-gradient-primary">
                                            {{ substr($media->link, 0, 50) }}...
                                        </label>
                                    </td>

                                    <td>
                                        <label class="badge fw-bold badge-gradient-info">
                                            @if (!is_null($media->time) || !empty($media->time))
                                                {{ $media->time }}
                                            @else
                                                --
                                            @endif
                                        </label>
                                    </td>

                                    <td>
                                        <a href="javascript:void(0);" wire:click="apply({{ $media->id }})"
                                            class="badge fw-bold badge-gradient-{{ $media->status == true ? 'success' : 'dark' }}"
                                            style="cursor: pointer">
                                            تفعيل
                                        </a>
                                    </td>

                                    <td>
                                        <div class="d-flex align-items-center">
                                            <a style="font-size: 1.2rem" class="mdi mdi-table-edit text-success ms-2"
                                                wire:click="edit({{ $media->id }})" data-bs-toggle="modal"
                                                data-bs-target="#support-modal-edit"></a>
                                            <a href="javascript:void(0);" style="font-size: 1.2rem"
                                                class="mdi mdi-delete text-danger"
                                                onclick="if(confirm('هل تود حذف هذا العنصر؟')) ? true : false"
                                                wire:click="destroy({{ $media->id }})"></a>
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
