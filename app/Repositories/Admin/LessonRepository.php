<?php

namespace App\Repositories\Admin;

use App\Models\Admin\Lesson;
use App\Models\Admin\Course;
use App\Models\Admin\LessonTranslation;
use Illuminate\Support\Facades\Storage;

class LessonRepository {

	public function __construct(Lesson $lesson)
	{
		$this->lesson = $lesson;
	}

	public function index()
	{
		$lessons = Lesson::orderBy('id','DESC')->paginate(100);
        return view('admin.lesson.index', compact('lessons'));
	}

	public function show($id)
	{
        $lesson = Lesson::findOrFail($id);
        return view('admin.lesson.show', compact('lesson'));
	}

	public function add()
	{
		$courses = Course::all();
        return view('admin.lesson.create',['courses' => $courses]);
	}

	public function createLesson($request)
	{
		$data = $request->all();
        $paid = isset($data['paid']) ? '1' : '0';
		$lesson_data = [
			'video' => $data['video'],
			'time' => $data['time'],
			'course_id' => $data['course_id'],
            'paid' =>$paid
		];
		$lesson = Lesson::create($lesson_data);
		$trans_data = [
			'title' => $data['title'],
			'description' => $data['description'],
			'body' => $data['body'],
			'locale' => $data['locale'],
			'lesson_id' => $lesson->id
		];
		$lessonTranslation = $lesson->translation()->create($trans_data);

		if($request->hasFile('image')){
			$image = $request->file('image')->store('public/lessons');
			$lesson->image = $image;
		}
		if($request->hasFile('file_first')){
			$file1 = $request->file('file_first')->store('public/files/');
			$lesson->file_first = $file1;
		}
		if($request->hasFile('file_second')){
			$file2 = $request->file('file_second')->store('public/files/');
			$lesson->file_second = $file2;
		}
		$lesson->save();
		if($lesson){
            if($lessonTranslation){
                return redirect()->route('lesson.edit', $lesson->id)->with(['msg' => 'Lesson created seccessfuly!']);
            }else{
                return back()->withErrors(['msg' => "Lesson translation had not created, there was error during save to translation!"])->withInput();
            }
        }else{
            return back()->withErrors(['msg' => "Lesson had not created, there was error during save to lesson!"])->withInput();
        }
	}

	public function edit($id)
	{
		$lesson = Lesson::findOrFail($id);
        $courses = Course::all();
        return view('admin.lesson.edit',compact('lesson','courses'));
	}

	public function updateLesson($request, $id)
	{
		$lesson = Lesson::findOrFail($id);
		$data = $request->all();
        $paid = isset($data['paid']) ? '1' : '0';
		$lesson_data = [
			'video' => $data['video'],
			'time' => $data['time'],
			'course_id' => $data['course_id'],
            'paid' => $paid
		];
		$lesson_edit = $lesson->update($lesson_data);
		$trans_data = [
			'title' => $data['title'],
			'description' => $data['description'],
			'body' => $data['body'],
			'locale' => $data['locale'],
			'lesson_id' => $id
		];
		$lessonTranslation = $lesson->translation()->update($trans_data);
		if(!$lessonTranslation){
			return $result = "Translation of lesson had not saved!";
		}
		if($request->hasFile('image')){
			$image = $request->file('image')->store('public/lessons');
			$lesson->image = $image;
		}else{
			$lesson->image = $request->delete_image;
		}
		if($request->hasFile('file_first')){
			$file1 = $request->file('file_first')->store('public/files');
			$lesson->file_first = $file1;
		}else{
			$lesson->file_first = $request->delete_file_first;
		}
		if($request->hasFile('file_second')){
			$file2 = $request->file('file_second')->store('public/files');
			$lesson->file_second = $file2;
		}else{
			$lesson->file_second = $request->delete_file_second;
		}
		$lesson->save();
        return back()->with(['msg' => "Lesson had saved successfuly!"]);
	}

	public function delete($id)
	{
		$lesson = Lesson::findOrFail($id);
        $lesson->translation()->delete();
        $lesson_delete = $lesson->delete();
        return back()->with(['msg' => 'Lesson had deleted successfuly!']);
	}
}
