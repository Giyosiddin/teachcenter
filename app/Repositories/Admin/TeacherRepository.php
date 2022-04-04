<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Teacher;

class TeacherRepository 
{
    public function index()
    {
        $teachers = Teacher::orderBy('id','ASC')->paginate(10);
        return view('admin.teacher.index', compact('teachers'));
    }

    public function add($request)
    {
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

    public function update($request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        $save = $teacher->update($request->all());
        if($request->hasFile('image')){     
            $ext_image = $request->file('image')->extension();
            $image = $request->file('image')->storeAs('public/teachers',$id.'.'.$ext_image);
            $teacher->image = $image;
            // dd($image);  
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
}
