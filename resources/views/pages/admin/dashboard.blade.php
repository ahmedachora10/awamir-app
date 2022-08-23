<x-app-layout>

    <x-admin.headline title="Dashboard" icon="home"/>

    <!-- Cards Info -->
    <div class="row">

        <x-admin.card-info title="المشتركين" bg="bg-gradient-primary" icon="account-multiple" value="25">
            25% الملتحقين هذا الاسبوع
        </x-admin.card-info>

        <x-admin.card-info title="الوظائف" bg="bg-gradient-info" icon="briefcase-check" value="156">
             <b class="fs-4">10</b> وظائف الاسبوع
        </x-admin.card-info>

        <x-admin.card-info title="طلبات خدمة السيرة" bg="bg-gradient-danger" icon="briefcase-check" value="156">
            30% من الطلبات هذاالاسبوع
        </x-admin.card-info>

        <x-admin.card-info title="المشاهدات" bg="bg-gradient-success" icon="eye" value="156">
             عدد الزيارات هذا الاسبوع 200
        </x-admin.card-info>

        <x-admin.card-info title="الدول" bg="bg-gradient-success" icon="mdi-city" :value="$countries">

        </x-admin.card-info>

        <x-admin.table title="الوظائف الاكثر مشاهدة" icon="folder-plus" :columns="['image', 'العنوان']">
            @forelse($popularJobs as $job)
                <tr>
                    <td> {{ $job->image }} </td>
                    <td> {{ $job->name }} </td>
                    <td> {{ $job->created_at->diffForHumans() }} </td>
                </tr>
            @empty
                <tr>
                    <td>{{ __('لا توجد وظائف حاليا') }}</td>
                    </tr>
                @endforelse
        </x-admin.table>

        <x-admin.table title="الوظائف المضافة حديثا" icon="folder-plus" :columns="['image', 'العنوان']">
            @forelse($popularJobs as $job)
                <tr>
                    <td> {{ $job->image }} </td>
                    <td> {{ $job->name }} </td>
                    <td> {{ $job->created_at->diffForHumans() }} </td>
                </tr>
            @empty
                <tr>
                    <td>{{ __('لا توجد وظائف حاليا') }}</td>
                </tr>
            @endforelse
        </x-admin.table>

        <x-admin.sample-card>

            <h4 class="card-title">المشاهدات</h4>

            <canvas id="areaChart" style="height: 312px; display: block; width: 625px;" width="625" height="312" class="chartjs-render-monitor"></canvas>

        </x-admin.sample-card>

    </div>

    @push('scripts')
        <script>
            var data = {
                labels: ["2013", "2014", "2014", "2015", "2016", "2017"],
                datasets: [{
                label: 'الزيارات',
                data: [10, 19, 3, 5, 2, 3],
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

        </script>
    @endpush

</x-app-layout>
