<?php

namespace App\Http\Livewire\Admin;

use App\Jobs\SendSubscribersEmailJob;
use App\Mail\SendLatestJobs;
use App\Models\Post;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class SendEmailToSubscribers extends Component
{

    public $jobsCount = 7;

    public $message = '';


    public function sendEmail()
    {
        $latestJobs = Post::latest()->take($this->jobsCount)->get();

        Subscriber::select('email')->chunk(20,function ($subscribers) use($latestJobs)
        {
            dispatch(new SendSubscribersEmailJob($subscribers, $latestJobs));
        });

        $this->message = 'تم ارسال الايميل بنجاح';

    }

    public function render()
    {
        return view('livewire.admin.send-email-to-subscribers');
    }
}
