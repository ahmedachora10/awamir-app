<?php

namespace App\Http\Helpers;


enum PostStatus:int {
    case PUBLISH = 1;
    case DRAFT = 2;
}
