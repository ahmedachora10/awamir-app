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
    public string|null $cls;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, array $columns, $icon = 'account-plus', $route = '', $buttonName="", $cls = null)
    {
        $this->title = $title;
        $this->columns = $columns;
        $this->icon = $icon;
        $this->route = $route;
        $this->buttonName = $buttonName;
        $this->cls = $cls;
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
