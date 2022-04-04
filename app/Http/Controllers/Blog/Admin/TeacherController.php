<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Repositories\Admin\TeacherRepository;
use App\Http\Requests\TeacherCreateRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Teacher;

class TeacherController extends Controller
{
    private $teacherRepository;

    public function __construct(TeacherRepository $teacherRepository)
    {
        $this->teacherRepository = $teacherRepository;
    }
    public function index()
    {
        return $this->teacherRepository->index();

    }

    public function create()
    {
        return view('admin.teacher.create');
    }

    public function store(TeacherCreateRequest $request)
    {
        return $this->teacherRepository->add($request);
    }

    public function update(TeacherCreateRequest $request, $id)
    {
        return $this->teacherRepository->update($request, $id);
    }

    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);
        return view('admin.teacher.edit',compact('teacher'));
    }
 
    public function delete($id)
    {
        $teacher = Teacher::findOrFail($id);
        $delete = $teacher->delete();
        return redirect()->route('teacher.index')->with(['success' => "Item was deleted! "]);
    }
}
