<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function Faqs(){
        return view('support.faqs');
    }
    public function About(){
        return view('support.about_us');
    }
    public function Contact(){
        return view('support.contact');
    }
    public function Privacy(){
        return view('support.privacy');
    }
}
