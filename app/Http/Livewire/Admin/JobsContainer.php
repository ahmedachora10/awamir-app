<?php

namespace App\Http\Livewire\Admin;

use Livewire\WithPagination;
use App\Models\Post;
use Livewire\Component;

class JobsContainer extends Component
{
    use WithPagination;

    const PAGINATE_NUMBER = 8;

    private $posts;

    public $search;

    public $isAdmin;

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->isAdmin = auth()->user()->hasRole('admin');
    }

    public function filter()
    {
        $this->search;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function makeSpecial(Post $post)
    {
        if($post) {
            $post->update(['special' => $post->special ? false : true]);
        }
    }

    public function render()
    {
        return view('livewire.admin.jobs-container', [
            'jobs' => Post::with('city','country', 'category')->where('posts.name', 'like', "%".$this->search."%")->latest()->paginate(self::PAGINATE_NUMBER)
        ]);
    }
}