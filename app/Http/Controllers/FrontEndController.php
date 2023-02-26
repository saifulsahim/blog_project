<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Comment;
use App\Models\User;
use App\Models\Reply;

class FrontEndController extends Controller
{
    public function home()
    {
        $posts = Post::with('category', 'user')->orderBy('created_at', 'DESC')->take(5)->get();
        $recentPosts = Post::with('category', 'user')->orderBy('created_at', 'DESC')->paginate(9);
        return view('website.home',compact(['posts','recentPosts']));
    }
    public function post($slug )
    {
        $post = Post::with('category', 'user')->where('slug', $slug)->first();
        if($post){
            $comments = Comment::orderBy('id','desc')->get();
            $replies = Reply::all();
            return view('website.post',compact('post','comments','replies'));
        }else{
            return redirect('/');
        }

    }
    public function category()
    {
        return view('website.category');
    }
    public function add_comment(Request $request)
    {
        //dd($request);
        $comment = new comment;
        $comment->name = Auth::user()->name;
        $comment->user_id = Auth::user()->id;
        $comment->comment = $request->comment;
        $comment->save();
        return redirect()->back();

//        if(Auth::id())
//        {
//
//        }else{
//            return redirect('login');
//
//        }

    }
    public function add_reply(Request $request)
    {
        //dd($request);
        if (Auth::id()) {
            $reply =  new Reply;
            $reply->name = Auth::user()->name;
            $reply->user_id = Auth::user()->id;
            $reply->comment_id = $request->Commentid;
            $reply->reply = $request->reply;
           // dd($reply);
            $reply->save();
            return redirect()->back();
        } else {
            return redirect('login');

        }
    }


}
