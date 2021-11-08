<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerResult extends Model
{
    use HasFactory;
    public $table = 'answers_result';
    public $guarded = [];
    public $timestamps = false;
}
