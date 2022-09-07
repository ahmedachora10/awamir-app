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

        <button type="submit" class="btn btn-gradient-primary mb-2">{{ __('Save') }}</button>
    </x-admin.card-table>


</x-app-layout>
