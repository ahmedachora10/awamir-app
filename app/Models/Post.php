<?php

namespace App\Models;

use App\Http\Helpers\PostStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id', 'country_id',
        'city_id', 'jobtype_id',
        'name', 'description', 'image', 'slug',
        'company', 'views', 'source',
        'status', 'url', 'keywords',
        'tls', 'cv', 'whatsapp',
        'submission', 'register_through_awamir',
        'special'
    ];

    public function scopePublished($query)
    {
        $query->where('status', PostStatus::PUBLISH->value);
    }

    public function scopeSpecial($query)
    {
        $query->where('special', true);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function jobType()
    {
        return $this->belongsTo(JobType::class, 'jobtype_id', 'id');
    }

}