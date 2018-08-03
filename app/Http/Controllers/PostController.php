<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\User;
use App\Post;
use App\Comment;
use App\Notification;
use App\Like;
use Auth;
use Hash;

class PostController extends Controller
{
    public function getRegister()
    {
        return view('auth.register');
    }
    public function postLogin(Request $request)
    {
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            return redirect('/home');
        }else{
            return back()->with('error','Invalid Username or password')->withInput();
        }
    }
    public function postRegister(RegisterRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->password = Hash::make($request->password);
        $user->save();

        Auth::loginUsingId($user->id);
        $notification = new Notification;
        $notification->user_id = "0";
        $notification->from_id = $user->id;
        $notification->content = "<b>".$user->name . "</b> has registered.";
        $notification->save();
        return redirect('/home');
    }
    public function postLogout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
    public function addNewPost(Request $request){
        if($request->image)
            $image = base64_encode(file_get_contents($request->file('image')));
        else
            $image = null;
        $post = new Post;
        $post->user_id = Auth::user()->id;
        $post->content = $request->content;
        $post->file = $image;
        $post->save();
        $notification = new Notification;
        $notification->user_id = "0";
        $notification->from_id = Auth::user()->id;
        $notification->content = "<b>".Auth::user()->name . "</b> has added a new post.";
        $notification->save();
        return back();
    }
    public function addComment(Request $request)
    {
        $post = Post::find($request->id);
        $comment = new Comment;
        $comment->user_id = Auth::user()->id;
        $comment->post_id = $request->id;
        $comment->content = $request->content;
        $comment->save();
        $notification = new Notification;
        $notification->user_id = $post->user_id;
        $notification->from_id = Auth::user()->id;
        $notification->content = "<b>".Auth::user()->name . "</b> has commented on your post.";
        $notification->save();
        return back();
    }
    public function like(Request $request)
    {
        $post = Post::find($request->post_id);
        $check = Like::where('user_id',Auth::user()->id)->where('post_id',$request->post_id)->count();
        if($check == 0){
            $like = new Like;
            $like->user_id = Auth::user()->id;
            $like->post_id = $request->post_id;
            $like->save();
            $notification = new Notification;
            $notification->user_id = $post->user_id;
            $notification->from_id = Auth::user()->id;
            $notification->content = "<b>".Auth::user()->name . "</b> has liked your post.";
            $notification->save();
        }else{
            Like::where('user_id',Auth::user()->id)->where('post_id',$request->post_id)->delete();
        }
        return back();
    }
    public function updatePost(Request $request)
    {
        $post = Post::find($request->id);
        if($request->image){
            $image = base64_encode(file_get_contents($request->file('image')));
            $post->image = $image;
        }
        $post->content = $request->content;
        $post->save();
        return back();
    }
    public function deletePost(Request $request)
    {
        Post::where('id',$request->id)->delete();
        return back();
    }
    public function updateProfile(Request $request)
    {
        $user = User::where('id',Auth::user()->id)->first();
        $user->name = $request->name;
        $user->contact = $request->contact;
        if($request->image){
            $image = base64_encode(file_get_contents($request->file('image')));
            $user->profile_image = $image;
        }
        $user->save();
        return back();
    }
}
