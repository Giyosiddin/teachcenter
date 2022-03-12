<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Admin\User;

class UserService
{

    public function change_status($user_id, $request)
    {
        $user = User::findOrFail($user_id);
        $user->roles()->detach();
        $user->roles()->attach($request['role']);
        $this->add_course($user_id, $request['courses']);
        return true;
    }
    public function add_course($user_id, $courses)
    {
        $user = User::findOrFail($user_id);
        $user->courses()->detach();
        $user->courses()->attach($courses);
        return true;
    }

}
