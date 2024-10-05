<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use \App\Models\Posts;
use \App\Models\Categories;
use \App\Models\Bookmark;


class PostsController extends Controller
{
    public function getAllPosts() {
        $user = Auth::user();

        $posts = Posts::
        select('posts.*', 'categories.category_name as category_name', 'users.name as name')
        ->Join('categories', 'categories_id','=','categories.id')
        ->Join('users', 'user_id','=','users.id')
        ->orderBy("posts.id","DESC")->get();

        $bookmarks = Bookmark::select(columns: "post_id")->where("user_id", "=",$user->id)->get();

        return view('dashboard', compact('posts', 'user', 'bookmarks'));
    }

    public function newPostForm(){
        $categories = Categories::orderBy('category_name','ASC')->get();

        return view('post/newPost', compact('categories'));
    }

    public function createNewPost(Request $request) {
        $request->validate([
            'title' => 'required',
            'post' => 'required',
            'category_id' => 'required'
        ]);

        // $user = Auth::user();

        $newPost = new Posts();

        $newPost->title = $request->title;
        $newPost->post = $request->post;
        $newPost->categories_id = $request->category_id;
        //this is supposed to be $user->id so different admin user can also show up, but it suddenly break and i can't get it to work again on this method
        $newPost->user_id = '1';

        $newPost->created_at = time();

        $imageName = "";

        if (!is_null($request->image)) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $newPost->addMedia('images/'.$imageName)->toMediaCollection();
        }

        $newPost->save();

        return redirect()->to('/');
    }

    public function editPostForm($id){
        $categories = Categories::orderBy('category_name','ASC')->get();
        $post = Posts::where('id',$id)->first();

        return view('post/editPost', compact('categories', 'post'));
    }

    public function editPost($id, Request $request) {
        $post = Posts::where('id',$id)->first();

        $imageName = "";

        if (!is_null($request->image)) {
            Storage::delete($post->image);
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);

        }

        $post->title = $request->title;
        $post->post = $request->post;
        $post->categories_id = $request->category_id;
        $post->image = "images/".$imageName;

        $post->save();

        return redirect()->to('/');
    }

    public function deletePost($id) {
        $user = Auth::user();
        if ($user->role != 'Admin'){
            return redirect()->to('/')->with('modal','Not Allowed');
        }

        Posts::where('id',$id)->delete();

        return redirect()->to('/');
    }

}
