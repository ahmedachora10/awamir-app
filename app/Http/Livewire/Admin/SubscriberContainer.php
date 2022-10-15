<?php

namespace App\Http\Livewire\Admin;

use Livewire\WithPagination;
use App\Models\Subscriber;
use Livewire\Component;

class SubscriberContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.admin.subscriber-container', [
            'subscribers' => Subscriber::latest()->paginate(8)
        ]);
    }
}