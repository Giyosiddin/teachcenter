<?php 

namespace App\Repositories;

use App\Models\Admin\Lesson;
use App\Models\Admin\LessonTranslation;

class LessonRepository {

	public function __construct(Lesson $lesson)
	{
		$this->lesson = $lesson;
	}

}
