<?php

namespace App\Http\Controllers\Blog\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends FrontBaseController
{
    
    public function home()
    {
        return view('pages.home');
    }
}
