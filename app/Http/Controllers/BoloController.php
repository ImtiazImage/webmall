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
        $validatedData = $request->validate([
            'name' => 'required|unique:categories|max:25|min:4',
            'slug' => 'required|unique:categories|max:15|min:2'
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['slug'] = $request->slug;

        // return response()->json($data);
        // echo "<pre>";
        // print_r($data);
        $category = DB::table('categories')->insert($data);
        if($category){
            $notification = array(
                'message' => 'Category has been successfully created!',
                'alert-type'=> 'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'There was an error craeting the category!',
                'alert-type'=> 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function AllCategories()
    {
        $category = DB::table('categories')->get();
        // return response()->json($category);
        // return view('category.all_category',compact('category'));
        return view('category.all_category')->with('category', $category);
    }
}
