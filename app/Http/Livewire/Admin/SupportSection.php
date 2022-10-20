<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use App\Models\Setting;
use App\Models\Support;
use Livewire\Component;

class SupportSection extends Component
{
    public $supportId = 0;
    public $content;
    public $time;
    public $type;
    public $eventName = '';
    public $open = false;


    protected $listeners = ['edit'];

    protected $rules = [
        'content' => 'required|string',
        'time' => 'nullable|string',
        'type' => 'required|integer',
    ];


    function mount($type = 1)
    {
        $this->type = $type;
    }

    public function apply(Support $support)
    {
        if($support) {
            if($this->type == 1) {
                Post::whereNotNull('register_through_awamir')->update(['register_through_awamir' => $support->content]);
            }

            if($this->type == 2) {
                Setting::where('name', 'cv_phone_number')->update(['content' => $support->content]);
            }
            session()->flash('success', 'تم تحديث كل الوظائف بنجاح');
        }
    }

    public function store()
    {
        Support::create($this->validate());

        session()->flash('success', 'تم اضافة العنصر بنجاح');
        $this->resetExcept('type');

    }

    public function edit(Support $support)
    {
        if($support) {
            $this->open = true;
            $this->supportId = $support->id;
            $this->content = $support->content;
            $this->time = $support->time;
            $this->eventName = 'update('. $support->id .')';
        }
    }

    public function create()
    {
        $this->open = true;
        $this->eventName = 'store';
        // $this->type = 'store';
    }

    public function update(Support $support)
    {
        if($support) {
            $support->update($this->validate());
        }

        session()->flash('success','تم تحديث العنصر بنجاح');
        $this->resetExcept('type');
    }

    public function destroy(Support $support)
    {
        if($support) {
            $support->delete();
        }
        session()->flash('success', 'تم حذف العنصر بنجاح');
    }

    public function render()
    {
        return view('livewire.admin.support-section', ['supports' => Support::where('type', $this->type)->get()]);
    }
}
