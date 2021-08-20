<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;
    public $fillable = [
        'name_uz',
        'name_ru',
        'name_en',
        'text_uz',
        'text_ru',
        'text_en',
        'direction_uz',
        'direction_ru',
        'direction_en',
        'image'
    ];
    public $timestamps = false;
}
