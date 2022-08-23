<x-app-layout>

    <x-admin.headline title="مشترك جديد" icon="folder-google-drive"/>

    <x-admin.card-table method="POST" action="{{ route('subscribers.store') }}">

        <div class="form-group">
            <x-admin.input type="email" id="email" name="email" :value="old('email')" placeholder="البريد الالكتروني" />
            @error('email')
                <span class="invalid-feedback d-block"> {{ $message }} </span>
            @enderror
        </div>

        <button type="submit" class="btn btn-gradient-primary mb-2">{{ __('Save') }}</button>
    </x-admin.card-table>


</x-app-layout>
