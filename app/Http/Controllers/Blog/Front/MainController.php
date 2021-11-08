<?php

namespace App\Http\Controllers\Blog\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Models\AnswerResult;
use App\Mail\SendMessage;
use App\Models\Question;
use App\Models\Course;
use App\Models\Answer;
use App\Models\Result;
use App\Models\Appel;
use App\Models\Exam;

class MainController extends FrontBaseController
{



    // public function courses()
    // {
    //     return view('pages.form-page');
    // }

    public function sendMessage(Request $request)
    {
        $details = $request->input();
        $send = Mail::to('giyosiddinmirzaboyev@gmail.com')->send(new SendMessage($details));
        if($send){
            return back()->with('success','Your message sent successfully!');
        }else{
            return "Murojat jo`natishda qandaydir xatolik yuz berdi, iltimos operatorimiz bilan telefon orqali bog`laning.";
        }

    }
    public function appels(Request $request)
    {
        $data = $request->all();
        $create = Appel::create($data);
       if($create){
           return "Murajat muvafaqiyatli jo`natildi.";
       }else{
           return "Murojat jo`natishda qandaydir xatolik yuz berdi, iltimos operatorimiz bilan telefon orqali bog`laning.";
       }
    }

    public function exams()
    {
        // $exams = Exam::all();
        $courses = Course::all();
        return view('pages.exams', compact('courses'));
    }
    public function getExam($id)
    {
        $exam = Exam::findOrFail($id);
        return view('pages.quiz', compact('exam'));
    }
    public function checkExam($id)
    {
        $total_points = 0;
        foreach(request('answer') as $q => $a){
            $answer = Answer::findOrFail($a);
            if(isset($answer->is_correct)){
                $total_points++;
            }
        }
        $result = Result::create([
            'user_id' => \Auth::user()->id,
            'exam_id' => $id,
            'total_points' => $total_points
        ]);
        foreach(request('answer') as $q => $a){
             AnswerResult::create([
                'result_id' => $result->id,
                'question_id' =>$q,
                'answer_id' => $a
            ]);
        }
        if($result){
            return redirect()->route('get.result', $result->id);
        }
    }

    public function getResult()
    {
        $result = Result::findOrFail(request('result_id'));
        return view('pages.result', compact('result'));
    }
    public function getAllResults()
    {
        $results = Result::where('user_id', \Auth::user()->id)->get();
        return view('pages.all-results', compact('results'));
    }
}
