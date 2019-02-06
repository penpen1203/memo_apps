<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Contact;
use Illuminate\Support\Facades\Mail;

class PagesController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }
    public function contact()
    {
        return view('contact');
    }
    public function send(Request $request)
    {
        $rules = [
            'email' => 'required|email',
            'title' => 'required|string',
            'body' => 'required'
        ];
        $this->validate($request, $rules);
        $to = 'f969ed5103-2ba634@inbox.mailtrap.io';
        $data = $request->only('email', 'title', 'body');
        Mail::to($to)->send(new Contact($data));

        \Flash::success('問い合わせを送信しました');
        return redirect()->route('articles.index');

    }

    //
}
