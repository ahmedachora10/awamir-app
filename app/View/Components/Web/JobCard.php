<?php

namespace App\View\Components\Web;

use Illuminate\View\Component;

class JobCard extends Component
{

    public $job;

    public $status;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($job, $status = '')
    {
        $this->job = $job;
        $this->status = $status;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.web.job-card');
    }
}
