<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class BookmarkController extends Controller
{
    public function showAllBookmark() {
        $user = Auth::user();
        $bookmarks = \App\Models\Bookmark::select(columns: "post_id")->where("user_id", "=",$user->id)->get();

        $posts = \App\Models\Posts::
        select('posts.*', 'categories.category_name as category_name', 'users.name as name')
        ->Join('categories', 'categories_id','=','categories.id')
        ->Join('users', 'user_id','=','users.id')
        ->join('bookmarks','posts.id','=','bookmarks.post_id')
        ->orderBy("posts.id","DESC")->get();

        return view('bookmarks', compact('posts', 'user', 'bookmarks'));
    }
    public function addBookmark($id) {
        $user = Auth::user();

        \App\Models\Bookmark::insert(['post_id' => $id,'user_id'=> $user->id]);

        return Redirect::back()->with('message','Operation Successful !');
    }

    public function deleteBookmark($id) {
        $user = Auth::user();

        \App\Models\Bookmark::where('post_id',$id)->where('user_id', '=', $user->id)->delete();

        return Redirect::back()->with('message','Operation Successful !');
    }
}
