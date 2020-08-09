<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PostController extends Controller
{

    public function AllPosts(){
        $posts = DB::table('posts')
                    ->join('categories','posts.category_id','categories.id')
                    ->select('posts.*','categories.name','categories.slug')
                    ->get();
        return view('post.all_posts',compact('posts'));
    }

    public function writePost()
    {
        $categories = DB::table('categories')->get();
        return view('post.writepost',compact('categories'));
    }

    public function StorePost(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:125',
            'details' => 'required|max:600',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $data = array();
        $data['title'] = $request->title;
        $data['category_id'] = $request->category_id;
        $data['details'] = $request->details;
        $image = $request->file('image'); 
        if($image){
            $image_name = hexdec(uniqid());
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.' '.$ext;
            $upload_path = 'frontend/image/';
            $image_url   = $upload_path.$image_full_name;
            $successs    = $image->move($upload_path, $image_full_name);
            
            $data['image'] = $image_url;
            DB::table('posts')->insert($data);
            
            $notification = array(
                'message' => 'Post has been successfully added!',
                'alert-type'=> 'success'
            );
            return Redirect()->back()->with($notification);

        } else {
            DB::table('posts')->insert($data);
            $notification = array(
                'message' => 'Post has been successfully added!',
                'alert-type'=> 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function ViewPost($id)
    {
        $post = DB::table('posts')
                    ->join('categories','posts.category_id','categories.id')
                    ->select('posts.*', 'categories.name', 'categories.slug')
                    ->where('posts.id',$id)
                    ->first();

        // return Response()->json($post);
        return view('post.view_post',compact('post'));
    }
}
