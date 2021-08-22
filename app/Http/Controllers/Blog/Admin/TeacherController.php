<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::orderBy('id','ASC')->paginate(10);
        return view('admin.teacher.index', compact('teachers'));

    }

    public function create()
    {
        return view('admin.teacher.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->all();
        $teacher = Teacher::create($data);
        if($request->hasFile('image')){			
            $ext_image = $request->file('image')->extension();
            $image = $request->file('image')->storeAs('public/teachers',$teacher->id.'.'.$ext_image);
            $teacher->image = $image;
            $teacher->save();
        }
        if($teacher){
            return redirect()->route('teacher.index')->with(['success' => 'Has been created!']);
        }else{
            return redirect()->back()->with(['error' => 'Error. Has not been created!']);
        }
    }

    public function update(Request $request, $id)
    {
        $teacher = Teacher::find($id);
        if(!$teacher){
            return back()->withErrors(['msg' => 'Not found teacher!'])->withInput();
        }
        $data = $request->all();
        $save = $teacher->update($data);
        if($request->hasFile('image')){			
			$ext_image = $request->file('image')->extension();
			$image = $request->file('image')->storeAs('public/teachers',$id.'.'.$ext_image);
			$teacher->image = $image;
		}else{
			$teacher->image = $request->delete_image;
		}
        $teacher->save();
        if($save){
            return back()->with(['msg' => " Successfuly updated"]);
        }else{
            return back()->withErrors(['msg' => " Error happen saving!"]);
        }

    }

    public function edit($id)
    {
        $teacher = Teacher::find($id);
        if(!$teacher){
            return back()->withErrors(['msg' => 'Not found teacher!']);
        }
        return view('admin.teacher.edit',compact('teacher'));
    }
 
    public function delete($id)
    {
        $teacher = Teacher::find($id);
        if($teacher){
            return back()->withErrors(['msg' => "Not found item!"]);
        }

        $delete = $teacher->delete();
        if($delete){
            return redirect()->route('teacher.index')->with(['success' => "Item was deleted! "]);
        }else{
            return back()->withErrors(['msg' => "Item has not deleted!"]);
        }
    }
}
