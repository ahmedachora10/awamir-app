<x-app-layout>

    <x-admin.headline title="New Cities" icon="folder-google-drive"/>

    <x-admin.card-table method="POST" action="{{ route('cities.store') }}">

        <div class="form-group">
            <x-admin.input type="text" id="name" name="name" :value="old('name')" placeholder="{{ __('Name') }}" />
            @error('name')
                <span class="invalid-feedback d-block"> {{ $message }} </span>
            @enderror
        </div>

        <div class="form-group">
            <x-admin.select-input name="country_id" id="country_id">
                <option>حدد الدولة</option>
                @forelse ($countries as $country)
                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                @empty
                @endforelse
            </x-admin.select-input>

            @error('country_id')
                <span class="invalid-feedback d-block"> {{ $message }} </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-gradient-primary mb-2">{{ __('Save') }}</button>
    </x-admin.card-table>


</x-app-layout>
