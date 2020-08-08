<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class BoloController extends Controller
{
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

    public function SingleViewCategory($id)
    {
        echo $id;
        $category = DB::table('categories')->where('id',$id)->first();
        return view('category.view_category')->with('category',$category);
    }

    public function DeleteCategory($id)
    {
        $delete = DB::table('categories')->where('id',$id)->delete();
        $notification = array(
            'message' => 'Category successfully deleted!',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function EditCategory($id)
    {
        $category = DB::table('categories')->where('id',$id)->first();
        return view('category.edit_category',compact('category'));
    }

    public function UpdateCategory(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:25|min:4',
            'slug' => 'required|max:15|min:2'
        ]);

        $data = array();
        $data['name'] = $request->name;
        $data['slug'] = $request->slug;

        // return response()->json($data);
        // echo "<pre>";
        // print_r($data);
        $category = DB::table('categories')->where('id',$id)->update($data);
        if($category){
            $notification = array(
                'message' => 'Category has been successfully Updated!',
                'alert-type'=> 'success'
            );
            return Redirect()->route('all.category')->with($notification);
        } else {
            $notification = array(
                'message' => 'Nothing to Update!',
                'alert-type'=> 'error'
            );
            return Redirect()->route('all.category')->with($notification);
        }
    }
}
