<?php

namespace App\Http\Livewire\Admin;

use App\Models\City;
use Livewire\WithPagination;
use Livewire\Component;

class CityContainer extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.admin.city-container', [
            'cities' => City::with('country')->latest()->paginate(8)
        ]);
    }
}