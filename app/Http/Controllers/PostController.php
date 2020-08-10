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
            return Redirect()->route('all.post')->with($notification);

        } else {
            DB::table('posts')->insert($data);
            $notification = array(
                'message' => 'Post has been successfully added!',
                'alert-type'=> 'success'
            );
            return Redirect()->route('all.post')->with($notification);
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

    public function DeletePost($id) 
    {
        $post = DB::table('posts')->where('id',$id)->first();
        if($post->image != null)
        $image = $post->image;
        $delete= DB::table('posts')->where('id',$id)->delete();
        if($delete)
        {
            unlink($image);
            $notification = array(
                'message' => 'Successfully Post Deleted!',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        } else {
            $notification = array(
                'message' => 'Something went Wrong! ',
                'alert-type'=> 'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function EditPost($id)
    {   $categories = DB::table('categories')->get();
        $post =  DB::table('posts')->where('id',$id)->first();

        return view('post.edit_post',compact('categories','post'));
        // echo "Edit post no: ".$id;
    }
    public function UpdatePost(Request $request, $id)
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

            unlink($request->old_photo);

            DB::table('posts')->where('id',$id)->update($data);
            
            $notification = array(
                'message' => 'Post has been successfully updated!',
                'alert-type'=> 'success'
            );
            return Redirect()->route('all.post')->with($notification);

        } else {
            $data['image'] = $request->old_photo;
            DB::table('posts')->where('id',$id)->update($data);
            $notification = array(
                'message' => 'Post has been successfully updated!',
                'alert-type'=> 'success'
            );
            return Redirect()->route('all.post')->with($notification);
        }
    }
}
