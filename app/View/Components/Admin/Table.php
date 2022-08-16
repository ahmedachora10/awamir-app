<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class Table extends Component
{

    public string $title;
    public array $columns;
    public string $icon;
    public $route;
    public $buttonName;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, array $columns, $icon = 'account-plus', $route = '', $buttonName="")
    {
        $this->title = $title;
        $this->columns = $columns;
        $this->icon = $icon;
        $this->route = $route;
        $this->buttonName = $buttonName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.admin.table');
    }
}
