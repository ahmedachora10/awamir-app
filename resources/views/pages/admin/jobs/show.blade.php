<x-app-layout>

    <x-admin.headline title="عرض الوظيفة" icon="folder-google-drive" />

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        {{-- <div class="d-flex align-items-center me-4 text-muted font-weight-light">
                    <i class="mdi mdi-account-outline icon-sm me-2"></i>
                    <span>jack Menqu</span>
                  </div> --}}

                        <div style="width: 300px">
                            <img src="{{ asset('storage/images/jobs/' . $job->image) }}" class="mb-2 mw-100 w-100 rounded"
                                alt="image">
                        </div>

                        <div class="col-auto me-3">
                            <h4 class="card-title">{{ $job->name }}</h4>
                            <div class="d-flex">
                                <div class="d-flex align-items-center text-muted font-weight-light mx-2">
                                    <i class="mdi mdi-clock icon-sm ms-2"></i>
                                    <span>{{ $job->created_at->diffForHumans() }}</span>
                                </div>
                                <div class="d-flex align-items-center text-muted font-weight-light mx-2">
                                    <i class="mdi mdi-map-marker-circle icon-sm ms-2"></i>
                                    <span>{{ $job->country->name }} - {{ $job->city->name }}</span>
                                </div>
                            </div>

                            <div class="d-flex mt-3">
                                <div class="d-flex align-items-center text-muted font-weight-light mx-2">
                                    <i class="mdi mdi-home-map-marker icon-sm ms-2"></i>
                                    <span>{{ $job->company }}</span>
                                </div>
                                <div class="d-flex align-items-center text-muted font-weight-light mx-2">
                                    @if ($job->status == App\Http\Helpers\PostStatus::PUBLISH->value)
                                        <label class="badge badge-info">منشور</label>
                                    @else
                                        <label class="badge badge-danger fw-bold">مسودة</label>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <form action="{{ route('posts.keyword', $job->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <x-admin.text-area placeholder="keywords" name="keywords" rows="10">
                                @if (!is_null($job->keywords))
                                    {{ $job->keywords }}
                                @else
                                    وظائف في مدينة {{ $job->city->name }}, وظائف في دولة {{ $job->country->name }},
                                    وظائف
                                    {{ $job->city->name }}, {{ $job->category->name }},
                                @endif
                            </x-admin.text-area>


                            <div class="col-md-4 form-group mt-4 mb-2">
                                <div class="d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox"
                                        value="{{ App\Http\Helpers\PostStatus::PUBLISH->value }}"
                                        @checked($job->status == App\Http\Helpers\PostStatus::PUBLISH->value) id="status" name="status">
                                    <label class="mb-0 fw-bold me-2"> نشر الوظيفة </label>
                                </div>
                            </div>

                            <x-admin.button class="btn-gradient-primary btn-fw mt-3">{{ __('Save') }}
                            </x-admin.button>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
