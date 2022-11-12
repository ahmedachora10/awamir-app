<?php

namespace App\View\Components\Web;

use App\Models\Post;
use Illuminate\View\Component;

class SpecialPosts extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $jobs = [])
    {
        $this->jobs = Post::special()->take(4)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.web.special-posts');
    }
}