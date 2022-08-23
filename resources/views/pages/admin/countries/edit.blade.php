<x-app-layout>

    <x-admin.headline title="New Countries" icon="folder-google-drive"/>

    <x-admin.card-table method="POST" action="{{ route('countries.update', $country->id) }}">

        @method('PUT')

        <div class="form-group">
            <x-admin.input type="text" id="name" name="name" :value="$country->name ?? old('name')" placeholder="{{ __('Enter City Name') }}" />
            <x-admin.error field="name" />
        </div> <!-- End Name -->

        <button type="submit" class="btn btn-gradient-primary mb-2">{{ __('Save') }}</button>

    </x-admin.card-table>


</x-app-layout>
