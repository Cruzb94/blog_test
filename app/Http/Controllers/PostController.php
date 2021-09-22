<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\User;
use Redirect;

class PostController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $posts = Post::where('user_id', Auth::user()->id)->with('user')->get();

        return view('home')->with(compact('posts'));

    }

    /**
     *Save Tweet
     */
    public function savePost(Request $request) {

        $validated = $request->validate([
            'title' => 'required|max:100',
            'description' => 'required|max:250',
        ]);

        $save_data = [
            'user_id' => Auth::user()->id,
            'message' => $request->message,
            'title' => $request->title,
            'description' => $request->description
        ];

        $post = Post::create($save_data);

        if($post) {
            return Redirect::back()->with('message', 'Post created successfully');
        }
        
    }
}
