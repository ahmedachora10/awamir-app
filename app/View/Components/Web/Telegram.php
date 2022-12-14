<?php

namespace App\View\Components\Web;

use Illuminate\View\Component;

class Telegram extends Component
{

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $link = '#')
    {
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.web.telegram');
    }
}