<x-app-layout>

    <x-admin.headline title="مشترك جديد" icon="folder-google-drive"/>

    <x-admin.card-table method="POST" action="{{ route('ads.store') }}">

        <div class="form-group">
            <x-admin.input type="text" id="name" name="name" :value="old('name')" placeholder=" اسم الاعلان " />

            <x-admin.error field="name" />
        </div>

        <div class="form-group">
            <x-admin.text-area type="text" id="content" name="content" :value="old('content')" placeholder=" الاعلان " rows="20" />

            <x-admin.error field="content" />
        </div>

        <div class="form-group col-md-3">
            <div class="d-flex align-items-center">
                <input class="form-check-input" type="checkbox" id="satuts" name="satuts" value="2">
                <label class="mb-0 fw-bold me-3 pb-0"> اظهار الاعلان </label>
                <x-admin.error field="satuts" />
            </div>
        </div>

        <button type="submit" class="btn btn-gradient-primary mb-2">{{ __('Save') }}</button>
    </x-admin.card-table>


</x-app-layout>
