<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('welcome');
    }

    public function about() {
        return view('about',['pageName'=>'About Us Page']);
    }
    public function contact() {
        return view('pages.contact');
    }
}
