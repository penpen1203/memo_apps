<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about()
    {
        return view('pages.about', $data);
    }
    public function contact()
    {
        return view('contact');
    }

    //
}
