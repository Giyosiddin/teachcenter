<?php 

namespace App\Http\Repositories;

use App\Models\Admin\Course;
use App\Models\Admin\CourseTranslation;

class CourseRepository {

	public function __construct(Course $course)
	{
		// parent::__construct();
		$this->course = $course;
	}

	public function createCourse($data)
	{
		$course_data = [
				'teacher_id' => $data['teacher_id'],
				'category_id' => $data['category_id'],
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
		$course_translation = CourseTranslation::create($course_translation);
		if($course){
			return $course;
		}
	}

	public function updateCourse($data, $id)
	{
		$course = Course::find($id);

		$course_data = [
				'teacher_id' => $data['teacher_id'],
				'category_id' => $data['category_id'],
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
		if($course){
			return $course;
		}
	}

}