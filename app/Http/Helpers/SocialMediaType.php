<?php

namespace App\Http\Helpers;


enum SocialMediaType:int {
    case WHATSAPP = 1;
    case TELEGRAM = 2;

    public function name()
    {
        return match($this) {
            SocialMediaType::WHATSAPP => __('Whatsapp'),
            SocialMediaType::TELEGRAM => __('Telegram'),
        };
    }
}