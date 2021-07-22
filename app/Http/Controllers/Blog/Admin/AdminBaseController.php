<?php

namespace App\Http\Controllers\Blog\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Blog\BaseController;
use Illuminate\Http\Request;

abstract class AdminBaseController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('status');

        // MetaTags

    }
}
