<div class="{{ $cls }} col-12 grid-margin">
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="card-title">{{ __($title) }}</h4>
                @if(!empty($route))
                    <x-admin.add-button class="btn-sm btn-gradient-primary" href="{{ $route }}">
                        {{ $buttonName }}
                        <i class="mdi mdi-{{ $icon }}"></i>
                    </x-admin.add-button>
                @endif
            </div>
            <div class="table-responsive">
                <table class="table" {{ $attributes }}>
                    <thead>
                        <tr>
                            @foreach ($columns as $col)
                                <th>{{ __(ucwords($col)) }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        {{ $slot }}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
