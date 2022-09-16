<?php

namespace App\View\Components\Web;

use Illuminate\View\Component;

class SocialMediaSampleButton extends Component
{
    public $media;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($media)
    {
        $this->media = $media;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.web.social-media-sample-button');
    }
}
