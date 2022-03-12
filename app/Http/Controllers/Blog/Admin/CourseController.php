<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use App\Http\Repositories\CourseRepository;
use Illuminate\Http\Request;
use App\Models\Admin\Course;
use App\Models\Admin\Category;
use App\Models\Teacher;

class CourseController extends Controller
{
    private $courseRepository;

    public function __construct(CourseRepository $courseRepository)
    {
        // parent::__construct();
        $this->courseRepository = app(CourseRepository::class);
    }

    public function index()
    {
        $courses = Course::orderBy('order','ASC')->get();
        return view('admin.course.index',compact('courses'));
    }

    public function create(Request $request)
    {

        $teachers = Teacher::all();
        $categories = Category::all();
        if($request->isMethod('get')){
            return view('admin.course.create',compact('teachers','categories'));
        }else{

            $validated = $request->validate([
                'title' => 'required|max:255',
                'description' => 'required|max:255',
                'body' => 'required',
                'locale' => 'required',
            ]);
            $create = $this->courseRepository->createCourse($request);
            if($create){
                return redirect()->route('course.edit',$create->id)->with(['msg' => "Course has been created successfuly!"]);
                // dd();
            }
        }
    }

    public function edit(Request $request, $id)
    {
        $course = Course::find($id);
        $categories = Category::all();
        $teachers = Teacher::all();
        if(!$course){
            return redirect()->route('course.index')->withErrors(['msg' => "Course not found!"])->withInput();
        }
        if($request->isMethod('get')){
            return view('admin.course.edit', compact('course','teachers','categories'));
        }else{
            $validated = $request->validate([
                'title' => 'required|max:255',
                'description' => 'required|max:255',
                'body' => 'required',
                'locale' => 'required',
            ]);
            $update = $this->courseRepository->updateCourse($request, $course->id);
            if($update){
                return redirect()->route('course.edit',$course->id)->with(['msg' => "Course has been created successfuly!"]);
            }
        }
    }

    public function delete($id)
    {
        $course = Course::find($id);
        if(!$course){
              return back()->withErrors(['msg' => "Course not found!"]);
        }
        $translation_delete = $course->translation()->delete();
        $delete = $course->delete();
        if($delete){
            return redirect()->route('course.index')->with(['msg' => 'Course has been deleted!']);
        }else{
            return back()->withErrors(['msg' => 'Course would not deleted!']);
        }
    }
    public function lessons($course_id)
    {
        $course = Course::find($course_id);
        $lessons = $course->lessons()->orderBy('id','ASC')->paginate(50);
        return view('admin.lesson.index', compact('lessons','course'));
    }
}
