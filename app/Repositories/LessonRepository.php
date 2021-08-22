<?php 

namespace App\Repositories;

use App\Models\Admin\Lesson;
use App\Models\Admin\LessonTranslation;
use Illuminate\Support\Facades\Storage;

class LessonRepository {

	public function __construct(Lesson $lesson)
	{
		$this->lesson = $lesson;
	}

	public function createLesson($request)
	{				
		$data = $request->all();
		$lesson_data = [
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
		
		if($request->hasFile('image')){			
			// dd($request->file('image'));
			$ext_image = $request->file('image')->extension();
			$image = $request->file('image')->storeAs('public/lessons',$lesson->id.'.'.$ext_image);
			$lesson->image = $image;
		}
		if($request->hasFile('file_first')){
			$ext_file1 = $request->file('file_first')->extension();
			$name_file1 = $request->file('file_first')->getClientOriginalName();
			$file1 = $request->file('file_first')->storeAs('public/files',$name_file1.'.'.$ext_file1);
			$lesson->file_first = $file1;
		}
		if($request->hasFile('file_second')){
			$ext_file2 = $request->file('file_second')->extension();
			$name_file2 = $request->file('file_second')->getClientOriginalName();
			$file2 = $request->file('file_second')->storeAs('public/files',$name_file2.'.'.$ext_file2);
			$lesson->file_second = $file2;
		}
		$lesson->save();
		return ['lesson' => $lesson, 'lessonTranslation' => $lessonTranslation];
	}

	public function editLesson($request, $id)
	{
		// dump($request->delete_file_first);
		// dd($request->delete_file_second);
		$lesson = Lesson::find($id);		
		$data = $request->all();
		$lesson_data = [
			'video' => $data['video'],
			'time' => $data['time'],
			'course_id' => $data['course_id']
		];
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
		if($request->hasFile('image')){			
			// dd($request->file('image'));		
			$ext_image = $request->file('image')->extension();
			$image = $request->file('image')->storeAs('public/lessons',$lesson->id.'.'.$ext_image);
			$lesson->image = $image;
		}else{
			$lesson->image = $request->delete_image;
		}
		if($request->hasFile('file_first')){
			$ext_file1 = $request->file('file_first')->extension();
			$name_file1 = $request->file('file_first')->getClientOriginalName();
			$file1 = $request->file('file_first')->storeAs('public/files',$name_file1.'.'.$ext_file1);
			$lesson->file_first = $file1;
		}else{
			$lesson->file_first = $request->delete_file_first;
		}
		if($request->hasFile('file_second')){
			$ext_file2 = $request->file('file_second')->extension();
			$name_file2 = $request->file('file_second')->getClientOriginalName();
			$file2 = $request->file('file_second')->storeAs('public/files',$name_file2.'.'.$ext_file2);
			$lesson->file_second = $file2;
		}else{
			$lesson->file_second = $request->delete_file_second;
		}
		$lesson->save();
		return true;
	}
}
