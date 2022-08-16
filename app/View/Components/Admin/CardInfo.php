<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class CardInfo extends Component
{

    public string $title;
    public string $bg;
    public string $icon;
    public string $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $bg, $icon, $value)
    {
        $this->title = $title;
        $this->bg = $bg;
        $this->icon = $icon;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.card-info');
    }
}
