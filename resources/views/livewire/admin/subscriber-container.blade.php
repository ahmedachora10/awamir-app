<div>
    <x-admin.table title="جميع المشتركين" icon="folder-plus" :route="route('subscribers.create')" :columns="['email', 'actions']">
        @forelse($subscribers as $subscriber)
            <tr>
                <td> {{ $subscriber->email }} </td>
                <td>
                    <div class="d-flex align-items-center">
                        <a href="{{ route('subscribers.edit', $subscriber->id) }}" style="font-size: 1.2rem"
                            class="mdi mdi-table-edit text-success me-2"></a>
                        {{-- <a href="" style="font-size: 1.2rem" class="mdi mdi-account-remove text-danger"></a> --}}
                        <x-admin.delete-button :route="route('subscribers.destroy', $subscriber->id)" class="mdi mdi-delete text-danger" />
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td>{{ __('No Cities') }}</td>
            </tr>
        @endforelse
    </x-admin.table>
    {{ $subscribers->links() }}

</div>
