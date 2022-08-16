<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class NotificationRow extends Component
{

    public $title;
    public $message;
    public $icon;
    public $image;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $message, $icon = '', $image = '')
    {
        $this->title = $title;
        $this->message = $message;
        $this->icon = $icon;
        $this->image = $image;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.notification-row');
    }
}
