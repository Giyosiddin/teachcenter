<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Repositories\Admin\LessonRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\LessonRequest;
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

    public function index()
    {
        return $this->lessonRepository->index();
    }

    public function add()
    {
      return $this->lessonRepository->add();   
    }

    public function create(LessonRequest $request)
    {
        return $this->lessonRepository->createLesson($request);
    }

    public function show($id)
    {
        return $this->lessonRepository->show($id);
    }

    public function edit($id)
    {
       return $this->lessonRepository->edit($id);
    }

    public function update(LessonRequest $request, $id)
    {
        return $this->lessonRepository->updateLesson($request,$id);
    }

    public function delete($id)
    {
        return $this->lessonRepository->delete($id);
    }
}
