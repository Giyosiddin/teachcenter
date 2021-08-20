<?php

namespace App\Http\Controllers\Blog\Front;

use App\Http\Controllers\Controller;
use App\Mail\SendMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Appel;

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
}
