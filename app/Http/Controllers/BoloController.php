<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class BoloController extends Controller
{
    public function writePost()
    {
        return view('post.writepost');
    }


    public function AddCategory(){
        return view('category.add_category');
    }
    public function StoreCategory(Request $request) 
    {
        $data = array();
        $data['name'] = $request->name;
        $data['slug'] = $request->slug;

        // return response()->json($data);
        // echo "<pre>";
        // print_r($data);
        $category = DB::table('categories')->insert($data);
        if($category){
            return Redirect()->back();
        }
    }
}
