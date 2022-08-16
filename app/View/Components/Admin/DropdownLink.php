<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class DropdownLink extends Component
{
    public string $title;

    public string $route;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $title, string $route)
    {
        $this->title = $title;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.dropdown-link');
    }
}
