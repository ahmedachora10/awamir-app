<x-app-layout>

    @livewireStyles
    <x-admin.headline title="Dashboard" icon="home"/>

    <!-- Cards Info -->
    <div class="row">

        @if($isAdmin)
            <x-admin.card-info title="الزيارات اليومية" bg="bg-gradient-primary" icon="eye" :value="$dailyViews" />

            <x-admin.card-info title="زيارات الاسبوع الحالي" bg="bg-gradient-info" icon="eye" :value="$currentWeekViews" />

            <x-admin.card-info title=" زيارات الاسبوع الماضي" bg="bg-gradient-danger" icon="eye" :value="$prevWeekViews" />

            <x-admin.card-info title="زيارات الشهر الماضي" bg="bg-gradient-success" icon="eye" :value="$monthlyViews" />

            <x-admin.card-info title=" مجموع الزيارات " bg="bg-gradient-dark" icon="eye" :value="$allViews" />
        @endif

        {{-- <x-admin.table title="الوظائف الاكثر مشاهدة" icon="folder-plus" :columns="['image', 'العنوان', 'التحديث' , '']">
            @forelse($popularJobs as $job)
                <tr>
                    <td> <img src="{{ asset('storage/images/jobs/'.$job->image) }}" alt="صورة الوظيفة" srcset="{{ asset('storage/images/jobs/'.$job->image) }}"> </td>
                    <td> {{ $job->name }} </td>
                    <td> {{ $job->updated_at->diffForHumans() }} </td>
                    <td>
                        <a href="{{ route('jobs.edit', $job->id) }}" style="font-size: 1.2rem" class="mdi mdi-table-edit text-success ms-2"></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td>{{ __('لا توجد وظائف حاليا') }}</td>
                    </tr>
                @endforelse
        </x-admin.table> --}}

        @if($isAdmin || !$isAdmin)
            @livewire('admin.jobs-container')

            {{-- <x-admin.table title="الوظائف المضافة حديثا" icon="folder-plus" :columns="['image', 'العنوان']">
                @forelse($latestJobs as $job)
                    <tr>
                        <td> <img src="{{ asset('storage/images/jobs/'.$job->image) }}" alt="صورة الوظيفة" srcset="{{ asset('storage/images/jobs/'.$job->image) }}"> </td>
                        <td> {{ $job->name }} </td>
                        <td> {{ $job->created_at->diffForHumans() }} </td>
                    </tr>
                @empty
                    <tr>
                        <td>{{ __('لا توجد وظائف حاليا') }}</td>
                    </tr>
                @endforelse
            </x-admin.table> --}}

            <x-admin.table title=" روابط التسجيل في أوامر " :columns="['الرابط', '']">
                <form method="POST" action="{{ route('settings.website.job.awamir.links') }}">
                    @csrf

                    @if(!empty(settings('register_through_awamir')))
                        @foreach (json_decode(settings('register_through_awamir')) as $link)
                            <tr>
                                <td>
                                    {{-- {{ $link }} --}}
                                    <input class="w-100 form-control border-0" type="text" name="register_through_awamir[]" value="{{ $link }}">
                                </td>
                                <td class="delete-link" style="cursor: pointer">
                                    {{-- <input type="hidden" name="register_through_awamir[]" value="{{ $link }}"> --}}
                                    <i class="mdi mdi-delete text-danger"></i>
                                </td>
                            </tr>

                        @endforeach
                    @endif
                    <button type="submit" class="btn btn-gradient-primary mb-2 float-start position-relative">{{ __('Save') }}</button>
                </form>
            </x-admin.table>
            @endif


        @if($isAdmin)
            <x-admin.sample-card>
                <h4 class="card-title">المشاهدات</h4>
                <canvas id="areaChart" style="height: 312px; display: block; width: 625px;" width="625" height="312" class="chartjs-render-monitor"></canvas>
            </x-admin.sample-card>
        @endif

    </div>

    @push('scripts')

        <script src="{{ asset('js/helpers.js') }}"></script>

        <script>

            @if($isAdmin)
                const viewers = {{ Illuminate\Support\Js::from($jobViewers) }};

                const date = viewers.map(item => item.date);

                const views = viewers.map(item => item.views);

                var data = {
                    labels: date,
                    datasets: [{
                    label: 'الزيارات',
                    data: views,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1,
                    fill: true
                    }]
                };

                var areaOptions = {
                    plugins: {
                    filler: {
                        propagate: true
                    }
                    }
                }

                if ($("#areaChart").length) {
                    var areaChartCanvas = $("#areaChart").get(0).getContext("2d");
                    var areaChart = new Chart(areaChartCanvas, {
                    type: 'line',
                    data: data,
                    options: areaOptions
                    });
                }
            @endif

            $('.delete-link').each(function () {
                $(this).click(function () {
                    $(this).parents('tr').remove();
                });
            });

            const changeStatusBtn = $('.change-status');

            if(changeStatusBtn.length) {
                changeStatusBtn.each(function() {
                    $(this).click(function () {
                        const jobId = $(this).attr('data-id');
                        const lable = $(this).find('label');

                        ajax({
                            url: '{{ route('posts.change.status') }}',
                            method: 'PUT',
                            data: {
                                job: jobId,
                            }
                        }).done(response =>  {

                            if(response.errros) return false;

                            const status = response.status;
                            const styles = {
                                1: {
                                    class: 'badge badge-danger',
                                    text: 'مسودة'
                                },
                                2: {
                                    class: 'badge badge-info',
                                    text: 'منشور'
                                }

                            };

                            lable.removeClass();

                            lable.addClass(styles[status].class);
                            lable.text(styles[status].text);


                        });
                    })
                });
            }

        </script>
    @endpush

    @livewireScripts
</x-app-layout>
