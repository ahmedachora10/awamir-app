<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'time', 'type'];

    public function scopeRegisterThroughAwamir($query)
    {
        $query->where('type', 1);
    }


    public function scopeCvLinks($query)
    {
        $query->where('type', 2);
    }
}