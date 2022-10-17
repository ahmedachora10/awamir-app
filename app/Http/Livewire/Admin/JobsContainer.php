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
        $this->posts = Post::with('city','country', 'category')->latest()->paginate(self::PAGINATE_NUMBER);
    }

    public function filter()
    {

        // $data = [];
        // if($this->search != '' ||  !is_null($this->search)) {
        // }

        $this->search;

    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        // $jobs = $this->posts ?? [];
        return view('livewire.admin.jobs-container', [
            'jobs' => Post::with('city','country', 'category')->where('posts.name', 'like', "%".$this->search."%")->latest()->paginate(self::PAGINATE_NUMBER)
        ]);
    }
}