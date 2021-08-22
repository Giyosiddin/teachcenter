<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
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
        'image'
    ];
    public $timestamps = false;
}
