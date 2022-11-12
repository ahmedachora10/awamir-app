<?php

namespace App\Models;

use App\Http\Helpers\SocialMediaType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'link',
        'time',
        'status',
    ];

    protected $casts = [
        'type' => SocialMediaType::class
    ];

    public function scopePubleshed($query)
    {
        $query->where('status', true);
    }
}