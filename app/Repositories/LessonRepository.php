<?php 

namespace App\Repositories;

use App\Models\Admin\Lesson;
use App\Models\Admin\LessonTranslation;

class LessonRepository {

	public function __construct(Lesson $lesson)
	{
		$this->lesson = $lesson;
	}

	public function createLesson($data)
	{
		$lesson_data = [
			'image' => $data['image'],
			'file_first' => $data['file_first'],
			'file_second' => $data['file_second'],
			'video' => $data['video'],
			'time' => $data['time'],
			'course_id' => $data['course_id']
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
		return ['lesson' => $lesson, 'lessonTranslation' => $lessonTranslation];
	}

	public function editLesson($data, $id)
	{
		$lesson_data = [
			'image' => $data['image'],
			'file_first' => $data['file_first'],
			'file_second' => $data['file_second'],
			'video' => $data['video'],
			'time' => $data['time'],
			'course_id' => $data['course_id']
		];
		$lesson = Lesson::find($id);
		$lesson_edit = $lesson->update($lesson_data);
		if(!$lesson_edit){
			return $result = "Lesson had not saved!";
		}
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

		return true;
	}
}
