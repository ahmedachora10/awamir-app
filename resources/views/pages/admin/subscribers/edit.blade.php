<x-app-layout>

    <x-admin.headline title="تعديل بيانات المشترك" icon="folder-google-drive"/>

    <x-admin.card-table method="POST" action="{{ route('subscribers.update', $subscriber->id) }}" enctype="multipart/form-data">

        @method('PUT')

        <div class="form-group">
            <x-admin.input type="email" id="email" name="email" :value="$subscriber->email ?? old('email')" placeholder="البريد الالكتروني" />
            <x-admin.error field="email" />
        </div> <!-- End Name -->

        <button type="submit" class="btn btn-gradient-primary mb-2">{{ __('Save') }}</button>

    </x-admin.card-table>


</x-app-layout>
