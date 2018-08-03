<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Post;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
 

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::orderBy('created_at','DESC')->get();
        return view('home',['posts'=>$posts]);
    }
    public function myHome()
    {
        if(Auth::user())
            return back();
        return view('welcome');
    }
    public function getLogin(){
        return view('welcome');
    }
    public function viewPost($id)
    {
        $post = Post::findOrFail($id);
        return view('viewPost',['post'=>$post]);
    }
    public function getMyPosts()
    {
        $posts = Post::where('user_id',Auth::user()->id)->orderBy('created_at','DESC')->get();
        return view('myposts',['posts'=>$posts]);
    }
    public function editPost($id)
    {
        $post = Post::findOrFail($id);
        if(Auth::user()->id != $post->user_id){
            return back()->with('error','No post available');
        }
        return view('editPost',['post'=>$post]);
    }
    public function getMyProfile()
    {
        return view('myProfile');
    }
}
