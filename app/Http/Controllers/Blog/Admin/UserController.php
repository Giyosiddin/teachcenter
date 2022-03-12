<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Admin\Course;
use App\Services\UserService;
use Illuminate\Http\Request;
use App\Models\Admin\User;
use App\Models\Admin\Role;

class UserController extends Controller
{

    public function users()
    {
        $users = User::paginate(10);
        return view('admin.users.get_users', compact('users'));
    }

    public function get_user($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        $courses = Course::with('translation')->get('id');
        return view('admin.users.change_status', compact('user','roles','courses'));
    }

    public function change_status($id)
    {
        $userSer = new UserService();
        $change_role=$userSer->change_status($id, request()->all());
        return back()->with(['msg'=>'User role has been changed successfuly!']);
    }
    public function userDelete($id)
    {
        $user = User::findOrFail($id);
        $delete = $user->delete($user);
        if($delete){
            return redirect()->back()->with(['msg' => 'User has been deleted!']);
        }else{
            return redirect()->back()->with(['msg' => 'User has not been deleted, heppened some error!']);
        }
    }
}
