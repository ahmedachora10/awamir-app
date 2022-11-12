<?php

namespace App\Jobs;

use App\Models\Post;
use App\Models\Setting;
use App\Models\SocialMedia;
use App\Models\Support;

class ChangeRegisterCvLinks {
    public function __invoke()
    {
        $links = Support::cvLinks()->get();

        foreach ($links as $link) {
            if($link->time == now()->format('H:i')) {
                Setting::where('name', 'cv_phone_number')->update(['content' => $link->content]);
            }
        }

    }
}