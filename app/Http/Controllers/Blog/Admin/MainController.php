<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\AdminBaseController;
use Illuminate\Http\Request;

class MainController extends AdminBaseController
{
    public function index()
    {
        return view('admin.index');
    }
}
