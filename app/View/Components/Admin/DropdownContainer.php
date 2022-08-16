<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class DropdownContainer extends Component
{

    public string $title;
    public string $href;
    public string $icon;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $title, string $href, string $icon)
    {
        $this->title = $title;
        $this->href = $href;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.dropdown-container');
    }
}
