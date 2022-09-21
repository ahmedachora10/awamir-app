<?php

namespace App\Jobs;

use App\Mail\SendLatestJobs;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendSubscribersEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $subscribers;

    public $latestJobs;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($subscribers, $latestJobs)
    {
        $this->subscribers = $subscribers;
        $this->latestJobs = $latestJobs;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach ($this->subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(new SendLatestJobs($this->latestJobs));
        }
    }
}
