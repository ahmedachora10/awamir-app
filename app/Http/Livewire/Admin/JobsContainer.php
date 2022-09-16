<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;

class JobsContainer extends Component
{

    private $posts;

    public $search;

    public function mount()
    {
        $this->posts = Post::with('city','country', 'category')->latest()->get();
    }

    public function filter()
    {

        $data = [];
        if($this->search != '' ||  !is_null($this->search)) {
            $data = Post::with('city','country', 'category')
            ->where('posts.name', 'like', "%".$this->search."%")
            ->latest()->get();
        } else {
            $data = Post::with('city','country', 'category')->latest()->get();
        }

        $this->posts = $data;

    }

    public function render()
    {
        $jobs = $this->posts ?? [];
        return view('livewire.admin.jobs-container', ['jobs' => $jobs]);
    }
}
