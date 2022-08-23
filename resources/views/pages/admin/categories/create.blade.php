<x-app-layout>

    <x-admin.headline title="New Category" icon="folder-google-drive"/>

    <x-admin.card-table method="POST" action="{{ route('categories.store') }}">

        <div class="form-group">
            <x-admin.input type="text" id="name" name="name" :value="old('name')" placeholder="{{ __('Name') }}" />
            @error('name')
                <span class="invalid-feedback d-block"> {{ $message }} </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-gradient-primary mb-2">{{ __('Save') }}</button>
    </x-admin.card-table>


</x-app-layout>
