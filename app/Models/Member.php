<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMediaTrait;

class Member extends Model implements HasMedia
{
    use HasFactory;
    use SoftDeletes;
    use InteractsWithMedia;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'grade_id',
    ];
    protected $appends = [
        'avatar',
    ];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function getAvatarAttribute()
    {
        if ($this->hasMedia("memeber_avatar")) {
            return $this->getFirstMediaUrl("memeber_avatar");
        }
        return asset("/images/member.jpeg");
    }
}
