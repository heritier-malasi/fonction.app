<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageHero extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','text','hero_image'
    ];
}
