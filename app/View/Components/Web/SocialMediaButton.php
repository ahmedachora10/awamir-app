<?php

namespace App\View\Components\Web;

use Illuminate\View\Component;

class SocialMediaButton extends Component
{

    public $background;
    public $media;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($media, $background = '')
    {
        $this->background = $background;
        $this->media = $media;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.web.social-media-button');
    }
}
