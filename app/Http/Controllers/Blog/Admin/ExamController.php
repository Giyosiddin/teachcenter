<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Question;
use App\Models\Admin\Answer;
use Illuminate\Http\Request;
use App\Models\Admin\Course;
use App\Models\Admin\Exam;

class ExamController extends Controller
{
    public function exams()
    {
        $exams = Exam::paginate(10);
        return view('admin.exams.index',compact('exams'));
    }
    public function createExam(Request $request)
    {
        if($request->isMethod('get')){
            $courses = Course::all();
            return view('admin.exams.create', compact('courses'));
        }else{
            $this->validate($request,[
                'course_id'=>'required|numeric',
                'title'=>'required|max:255'
             ]);
            $data = $request->all();
            $exam = Exam::create($data);
            if($exam){
                return redirect()->route('admin.exams.view',$exam->id);
            }else{
                return back()->withInput()->withError(['msg'=>'Exam has not created!']);
            }

        }
    }
    public function view($id)
    {
        $exam = Exam::findOrFail($id);
        return view('admin.exams.view', compact('exam'));
    }

    public function updateExam($id)
    {                  
        $exam = Exam::findOrFail($id);
        if(request()->isMethod('get')){              
            $courses = Course::all();
            return view('admin.exams.update', compact('exam','courses'));
        }else{
            $this->validate(request(),[
                'course_id'=>'required|numeric',
                'title'=>'required|max:255'
             ]);
            $data = request()->all();
            $exam_update = $exam->update($data);
            if($exam_update){
                return redirect()->route('admin.exams.view',$exam->id);
            }else{
                return back()->withInput()->withError(['msg'=>'Exam has not updated!']);
            }
        }
    }
    public function deleteExam($id)
    {
        $exam = Exam::findOrFail($id);
        foreach($exam->questions as $question){
            if($question->answers->pluck('id')){
                $delete_answers = $question->answers()->delete();
            }
        }
        $delete_questions = $exam->questions()->delete();
        $delete_exam=$exam->delete();
        return back()->with(['msg'=>'Exam and questions in this exam have deleted!']);
    }

    public function createQuestion($exam_id){
        if(request()->isMethod('get')){
            return view('admin.exams.question.create');
        }else{
            $data = request()->all();
            $question = Question::create([
                'question' => $data['question'],
                'exam_id' => $exam_id
            ]);
            if(!$question){
                return back()->withInput()->with(['msg'=>'Question has not created']);
            }
            foreach($data['answers'] as $answer){
                if(array_key_exists('is_correct',$answer)){
                    $is_correct = 1;
                }else{
                    $is_correct = null;
                }
                $answer_data = [
                    'answer' => $answer['answer'],
                    'is_correct' => $is_correct,
                    'question_id' => $question->id
                ];
                $add_answer = Answer::create($answer_data);
            }
            
            return redirect()->route('admin.exams.view',$exam_id)->with(['msg' => 'Answer has added!']);
        }
    }

    public function editQuestion($exam_id, $id)
    {
        $question = Question::findOrFail($id);
        if(request()->isMethod('get')){
            return view('admin.exams.question.edit',compact('question'));
        }else{
            $data = request()->all();
            $question_update = $question->update([
                'question' => $data['question']
            ]);
            if(!$question_update){
                return back()->withInput()->with(['msg'=>'Question has not updated']);
            }
            foreach($data['answers'] as $answer_id => $answer){
                if(array_key_exists('is_correct',$answer)){
                    $is_correct = 1;
                }else{
                    $is_correct = null;
                }
                $answer_data = [
                    'answer' => $answer['answer'],
                    'is_correct' => $is_correct,
                    'question_id' => $question->id
                ];
                $update_answer = Answer::where('id',$answer_id)->update($answer_data);
            }
            
            return redirect()->route('admin.exams.view',$exam_id)->with(['msg' => 'Answer has updated!']);

        }

    }
    public function questionDelete($id)
    {
        $question = Question::findOrFail($id);
        if($question->answers->pluck('id')){
            $delete_answers = $question->answers()->delete();
        }
        $delete_question = $question->delete();
        return back()->with(['msg'=>'Exam and questions in this exam have deleted!']);
    }

}
