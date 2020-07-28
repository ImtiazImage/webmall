<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BoloController extends Controller
{
    public function writePost(){
        return view('post.writepost');
    }


    public function AddCategory(){
        return view('category.add_category');
    }
}
