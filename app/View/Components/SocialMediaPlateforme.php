<?php

namespace App\View\Components;

use App\Models\SocialMedia;
use Illuminate\View\Component;

class SocialMediaPlateforme extends Component
{
    public $media;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->media = SocialMedia::publeshed()->first();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.social-media-plateforme');
    }
}