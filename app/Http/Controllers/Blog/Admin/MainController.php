<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Blog\Admin\AdminBaseController;
use Illuminate\Http\Request;
use App\Models\Admin\Appel;
use App\Models\Admin\User;
use App\Models\Admin\Role;

class MainController extends AdminBaseController
{
    public function index()
    {
        return view('admin.index');
    }
    public function appels()
    {
        $appels_consalting = Appel::where('type','consalting')->get();
        $appels_course = Appel::where('type','course')->get();
        return view('admin.appels', compact('appels_consalting','appels_course'));
    }
    public function appelDelete($id)
    {
        $appel = Appel::find($id);
        $delete = $appel->delete();
        if($delete){
            return back()->with(['msg' => "Appel deleted successfuly!"]);
        }
    }
    public function users()
    {
        $users = User::paginate(10);
        return view('admin.users.get_users', compact('users'));
    }

    public function change_status($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        if(request()->isMethod('get')){
            return view('admin.users.change_status', compact('user','roles'));
        }else{
            $change_role = \DB::table('user_roles')->where('user_id', $id)
            ->update(['role_id' => request()->role]);
            if($change_role){
                return back()->with(['msg'=>'User role has been changed successfuly!']);
            }else{
                return back()->withErrors(['msg' => "This has been someone error, please try agein!"]);
            }
            // dd($change_role);
        }
    }

}
