<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class Error extends Component
{
    public string $field;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $field)
    {
        $this->field = $field;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.error');
    }
}
