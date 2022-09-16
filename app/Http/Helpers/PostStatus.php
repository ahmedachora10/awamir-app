<?php

namespace App\Http\Helpers;


enum PostStatus:int {
    case PUBLISH = 2;
    case DRAFT = 1;
}
