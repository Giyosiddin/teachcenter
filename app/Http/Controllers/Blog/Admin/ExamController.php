<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Course;
use App\Models\Admin\Exam;

class ExamController extends Controller
{
    public function exams()
    {
        return view('admin.exams.index');
    }
    public function createExam(Request $request)
    {
        if($request->isMethod('get')){
            $courses = Course::all();
            return view('admin.exams.create', compact('courses'));
        }else{
            

        }
    }
}
