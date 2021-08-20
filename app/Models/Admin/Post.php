<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'title_uz',
        'title_ru',
        'title_en',
        'excerpt_uz',
        'excerpt_ru',
        'body_uz',
        'excerpt_en',
        'body_ru',
        'body_en',
        'image',
        'slug',
        'created_at',
        'updated_at',
        'for_slider',
    ];

    // public $guarded = [];
}
