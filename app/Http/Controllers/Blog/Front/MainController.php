<?php

namespace App\Http\Controllers\Blog\Front;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\SendMessage;
use App\Models\Course;
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
}
