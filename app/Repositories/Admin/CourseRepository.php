<?php

namespace App\Http\Repositories\Admin;

use App\Models\Admin\Course;
use App\Models\Admin\Teacher;
use App\Models\Admin\Category;
use App\Models\Admin\CourseTranslation;

class CourseRepository {

	public function __construct(Course $course)
	{
		// parent::__construct();
		$this->course = $course;
	}

	public function index()
	{
		$courses = Course::orderBy('order','ASC')->get();
        return view('admin.course.index',compact('courses'));
	}

	public function addCourse()
	{
		$teachers = Teacher::all();
        $categories = Category::all();
        return view('admin.course.create',compact('teachers','categories'));
	}

	public function createCourse($request)
	{
		$data = $request->all();
		$course_data = [
				'teacher_id' => $data['teacher_id'],
				'category_id' => $data['category_id'],
                'order' => $data['order']
			];
		$course = Course::create($course_data);

		$course_translation = [
			'course_id' => $course->id,
			'locale' => $data['locale'],
			'title' => $data['title'],
			'description' => $data['description'],
			'body' => $data['body'],
			'details' => $data['details'],
		];
		if($request->hasFile('image')){
			$ext_image = $request->file('image')->extension();
			$image = $request->file('image')->storeAs('public/courses',$course->id.'.'.$ext_image);
			$course->image = $image;
		}

		$course->save();
		$course_translation = CourseTranslation::create($course_translation);
		if($course){
			return redirect()->route('course.edit', $course->id);
		}
	}

	public function edit($id)
	{
		$course = Course::findOrFail($id);
        $categories = Category::all();
        $teachers = Teacher::all();
        return view('admin.course.edit', compact('course','teachers','categories'));
	}

	public function updateCourse($request, $id)
	{
		$data = $request->all();
		$course = Course::find($id);

		$course_data = [
				'teacher_id' => $data['teacher_id'],
				'category_id' => $data['category_id'],
                'order' => $data['order']
			];
		$course->update($course_data);
		$course_translation = [
			'course_id' => $course->id,
			'locale' => $data['locale'],
			'title' => $data['title'],
			'description' => $data['description'],
			'body' => $data['body'],
			'details' => $data['details'],
		];
		$course->translation->update($course_translation);
		if($request->hasFile('image')){
			// dd($request->file('image'));
			$ext_image = $request->file('image')->extension();
			$image = $request->file('image')->storeAs('public/courses',$course->id.'.'.$ext_image);
			$course->image = $image;
		}else{
			$course->image = $request->delete_image;
		}
		$course->save();
		return redirect()->route('course.edit', $course->id);
	}

	public function delete($id)
	{
		$course = Course::with('translation')->findOrFail($id);
        $translation_delete = $course->translation()->delete();
        $delete = $course->delete();
        return redirect()->route('course.index')->with(['msg' => 'Course has been deleted!']);
	}

	public function lessons($course_id)
	{
        $lessons = Course::with('lessons','translation')->find($course_id)->lessons()->with('course','course.translation')->orderBy('id','ASC')->paginate(50);
        return view('admin.lesson.index', compact('lessons'));
	}
}
