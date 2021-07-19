<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Notifiable;

    protected $hidden = [
        'password',
        'remember_token'
    ];

    protected $casts = [
        'email_verified_at' => 'datatime',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role','user_roles')->withTimestamps();
    }
}