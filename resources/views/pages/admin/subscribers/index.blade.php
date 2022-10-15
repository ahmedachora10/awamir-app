<x-app-layout>

    <x-admin.headline title="المشتركين" icon="folder-google-drive" />

    @livewireStyles

    @livewire('admin.send-email-to-subscribers')

    @livewire('admin.subscriber-container')


    @livewireScripts
</x-app-layout>
