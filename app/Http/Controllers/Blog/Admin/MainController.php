<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Blog\Admin\AdminBaseController;
use Illuminate\Http\Request;
use App\Models\Admin\Appel;

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

}
