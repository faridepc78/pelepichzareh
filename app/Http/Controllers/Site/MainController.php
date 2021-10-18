<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function home()
    {
        return view('site.home.index');
    }

    public function about_us()
    {
        return view('site.about-us.index');
    }

    public function contact_us()
    {
        return view('site.contact-us.index');
    }

    public function contact_us_send()
    {

    }
}
