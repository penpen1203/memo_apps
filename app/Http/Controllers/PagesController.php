<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about(){
        $data=array();
        $data['first_name']='hoge';
        $data['last_name']='hoge';

        return view('pages.about',$data);
    }
        public function contact(){
        return view('contact');
    }

    //
}
