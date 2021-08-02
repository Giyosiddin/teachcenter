<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Repositories\LessonRepository;
use App\Http\Controllers\Controller;
use App\Models\Admin\Course;
use Illuminate\Http\Request;
use App\Models\Admin\Lesson;

class LessonController extends Controller
{
    private $lessonRepository;

    public function __construct(LessonRepository $lessonRepository)
    {
        $this->lessonRepository = app(LessonRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::all();
        return view('admin.lesson.index', compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->isMethod('get')){
            $courses = Course::all();
            return view('admin.lesson.create',['courses' => $courses]);
        }else{
            $validated = $request->validate([
                'title' => 'required|max:255',
                'body' => 'required',
                'locale' => 'required',
            ]);
            $data = $request->all();
            $create = $this->lessonRepository->createLesson($data);
            if($create['lesson']){
                if($create['lessonTranslation']){
                    return redirect()->route('lesson.edit', $create['lesson']->id)->with(['msg' => 'Lesson created seccessfuly!']);
                }else{
                    return back()->withErrors(['msg' => "Lesson translation had not created, there was error during save to translation!"])->withInput();
                }
            }else{
                return back()->withErrors(['msg' => "Lesson had not created, there was error during save to lesson!"])->withInput();
            }
            // dd($create);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $lesson = Lesson::find($id);
        $courses = Course::all();
        if(!$lesson){
            return back()->withErrors('Lesson not found!', 'msg');
        }
        if($request->isMethod('get')){
            return view('admin.lesson.edit',compact('lesson','courses'));
        }else{
            $validated = $request->validate([
                'title' => 'required|max:255',
                'body' => 'required',
                'locale' => 'required',
            ]);
            $data = $request->all();
            $edit = $this->lessonRepository->editLesson($data,$id);
            // dd($edit);
            if($edit){
                return back()->with(['msg' => "Lesson had saved successfuly!"]);
            }else{
                return back()->withErrors(['msg' => $edit]);
            }
        }
    }

    public function delete($id)
    {
        $lesson = Lesson::find($id);
        if(!$lesson){
            return back()->withErrors(['msg' => 'Lesson not found with this ID!']);
        }
        $lesson->translation()->delete();
        $lesson_delete = $lesson->delete();
        if($lesson_delete){
            return back()->with(['msg' => 'Lesson had deleted successfuly!']);
        }
    }
}
