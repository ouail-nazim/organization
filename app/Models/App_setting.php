<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class App_setting extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'key',
        'value',
    ];
}
