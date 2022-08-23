<x-app-layout>

    <x-admin.headline title="Edit Type" icon="folder-google-drive"/>

    <x-admin.card-table method="POST" action="{{ route('job-types.update', $jobType->id) }}" enctype="multipart/form-data">

        @method('PUT')

        <div class="form-group">
            <x-admin.input type="text" id="name" name="name" :value="$jobType->name ?? old('name')" placeholder="{{ __('Name') }}" />
            <x-admin.error field="name" />
        </div> <!-- End Name -->

        <button type="submit" class="btn btn-gradient-primary mb-2">{{ __('Save') }}</button>

    </x-admin.card-table>


</x-app-layout>
