<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Repositories\Admin\CourseRepository;
use App\Http\Controllers\Controller;
use App\Http\Requests\CourseRequest;
use App\Models\Admin\Category;
use Illuminate\Http\Request;
use App\Models\Admin\Course;
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
        return $this->courseRepository->index();
    }

    public function addCourse()
    {
       return $this->courseRepository->addCourse();        
    }

    public function create(CourseRequest $request)
    {
        return $this->courseRepository->createCourse($request);
    }

    public function edit($id)
    {    
        return $this->courseRepository->edit($id);
    }

    public function update(CourseRequest $request, $id)
    {
         return $this->courseRepository->updateCourse($request, $id);
    }

    public function delete($id)
    {
        return $this->courseRepository->delete($id);
    }

    public function lessons($course_id)
    {
        return $this->courseRepository->lessons($course_id);
    }
}
