<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function home()
    {
        return view('site.home.index');
    }
}
