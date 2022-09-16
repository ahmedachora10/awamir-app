<x-app-layout>

    <x-admin.headline title="تعديل الاعلان" icon="folder-google-drive"/>

    <x-admin.card-table method="POST" action="{{ route('ads.update', $ad->id) }}" enctype="multipart/form-data">

        @method('PUT')

        <div class="form-group">
            <x-admin.input type="text" id="name" name="name" :value="$ad->name ?? old('name')" placeholder=" اسم الاعلان " />
            <x-admin.error field="name" />
        </div> <!-- End Name -->

        <div class="form-group">
            <x-admin.text-area type="text" id="content" name="content" :value="old('content')" placeholder=" الاعلان " rows="20">
                {{ $ad->content }}
            </x-admin.text-area>
            <x-admin.error field="content" />
        </div>

        <div class="form-group col-md-3">
            <div class="d-flex align-items-center">
                <input class="form-check-input" @checked($ad->status == 2) type="checkbox" id="status" name="status" value="2">
                <label class="mb-0 fw-bold me-3 pb-0"> اظهار الاعلان </label>
                <x-admin.error field="status" />
            </div>
        </div>

        <button type="submit" class="btn btn-gradient-primary mb-2">{{ __('Save') }}</button>

    </x-admin.card-table>


</x-app-layout>
