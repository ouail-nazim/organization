<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMediaTrait;


class Meeting extends Model implements HasMedia
{
    use HasFactory;
    use SoftDeletes;
    use InteractsWithMedia;

    protected $fillable = [
        'ar_title',
        'ar_description',
        'en_title',
        'en_description',
    ];
    protected $appends = [
        'cover',
    ];

    public function getCoverAttribute()
    {
        if ($this->hasMedia("meeting_cover")) {
            return $this->getFirstMediaUrl("meeting_cover");
        }
        return asset("/images/bg.jpg");
    }
}
