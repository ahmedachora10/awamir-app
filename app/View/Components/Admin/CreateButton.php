<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class CreateButton extends Component
{

    public string $route;

    /**
     * Create a new component instance.
     *@param string $route
     * @return void
     */
    public function __construct(string $route)
    {
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.create-button');
    }
}
