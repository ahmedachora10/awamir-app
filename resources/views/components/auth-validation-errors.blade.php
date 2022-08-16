@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>

        <p class="alert alert-danger">
            بيانات الاعتماد هذه غير متطابقة مع البيانات المسجلة لدينا.
        </p>
        {{-- <ul class="mt-3 list-disc list-inside text-sm text-red-600">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul> --}}
    </div>
@endif
