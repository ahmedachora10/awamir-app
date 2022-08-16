<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class CheckBox extends Component
{
    public string $title;
    public string $cls;
    public bool $checked;
    // public string $name;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $checked = false, $cls="success me-3")
    {
        $this->title = $title;
        $this->cls = $cls;
        $this->checked = $checked;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.check-box');
    }
}
