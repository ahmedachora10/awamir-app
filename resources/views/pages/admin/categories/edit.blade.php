<x-app-layout>

    <x-admin.headline title="New Categories" icon="folder-google-drive"/>

    <x-admin.card-table method="POST" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">

        @method('PUT')

        <div class="form-group">
            <x-admin.input type="text" id="name" name="name" :value="$category->name ?? old('name')" placeholder="{{ __('Name') }}" />
            <x-admin.error field="name" />
        </div> <!-- End Name -->

        <button type="submit" class="btn btn-gradient-primary mb-2">{{ __('Save') }}</button>

    </x-admin.card-table>


</x-app-layout>
