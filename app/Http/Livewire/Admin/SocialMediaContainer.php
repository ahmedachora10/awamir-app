<?php

namespace App\Http\Livewire\Admin;

use App\Models\SocialMedia;
use Livewire\Component;

class SocialMediaContainer extends Component
{

    // protected $listeners = ['edit'];
    public $mediaId;
    public $type;
    public $link;
    public $time;

    public $eventName = '';
    public $open = false;

    protected $rules = [
        'link' => 'required|string',
        'time' => 'nullable|string',
        'type' => 'required|integer',
    ];


    public function apply(SocialMedia $media)
    {
        if($media) {
            $media->update(['status' => $media->status ? false : true]);
            SocialMedia::where('id','<>', $media->id)->update(['status' => false]);
            session()->flash('success', 'تم تحديث كل الوظائف بنجاح');
        }
    }

    public function store()
    {
        SocialMedia::create($this->validate());

        session()->flash('success', 'تم اضافة العنصر بنجاح');

        $this->reset();

    }

    public function edit(SocialMedia $media)
    {
        if($media) {
            $this->open = true;
            $this->mediaId = $media->id;
            $this->link = $media->link;
            $this->type = $media->type->value;
            $this->time = $media->time;
            $this->eventName = 'update('. $media->id .')';
        }
    }

    public function create()
    {
        $this->open = true;
        $this->eventName = 'store';
    }

    public function update(SocialMedia $media)
    {
        if($media) {
            $media->update($this->validate());
        }

        session()->flash('success','تم تحديث العنصر بنجاح');
        $this->reset();
    }

    public function destroy(SocialMedia $media)
    {
        if($media) {
            $media->delete();
        }
        session()->flash('success', 'تم حذف العنصر بنجاح');
    }

    public function render()
    {
        return view('livewire.admin.social-media-container', ['socialMedia' => SocialMedia::all()]);
    }
}