<x-app-layout>

    <x-admin.headline title="New Job" icon="folder-google-drive"/>

    <x-admin.card-table method="POST" action="{{ route('jobs.update', $job->id) }}" enctype="multipart/form-data">

        @method('PUT')

        <div class="form-group">
            <x-admin.input type="text" id="name" name="name" :value="$job->name ?? old('name')" placeholder="{{ __('Name') }}" />
            <x-admin.error field="name" />
        </div> <!-- End Name -->

        <button type="submit" class="btn btn-gradient-primary mb-2">{{ __('Save') }}</button>

    </x-admin.card-table>


</x-app-layout>
