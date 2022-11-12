<?php

namespace App\Jobs;

use App\Models\SocialMedia;

class ChangeSocialMediaPlatform {
    public function __invoke()
    {
        $media = SocialMedia::all();

        foreach ($media as $md) {
            if($md->time == now()->format('H:i')) {
                $md->update(['status' => true]);
                SocialMedia::where('id', '<>', $md->id)->update(['status' => false]);
            }
        }

    }
}