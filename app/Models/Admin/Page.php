<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Page extends Model
{
    use HasFactory;
    public $guarded = [];
    protected $fillable =[
        'title_uz',
        'title_ru',
        'title_en',
        'excerpt_uz',
        'excerpt_ru',
        'excerpt_en',
        'body_uz',
        'body_ru',
        'body_en',
        'template',
        'slug',
        'image',
        'parent_id',
        'position_menu'
    ];

}
