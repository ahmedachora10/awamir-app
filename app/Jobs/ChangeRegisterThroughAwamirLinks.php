<?php

namespace App\Jobs;

use App\Models\Post;
use App\Models\SocialMedia;
use App\Models\Support;

class ChangeRegisterThroughAwamirLinks {
    public function __invoke()
    {
        $links = Support::registerThroughAwamir()->get();

        foreach ($links as $link) {
            if($link->time == now()->format('H:i')) {
                Post::whereNotNull('register_through_awamir')->update(['register_through_awamir' => $link->content]);
            }
        }

    }
}