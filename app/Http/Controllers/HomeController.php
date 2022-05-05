<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        $posts = $post->all();
        // $posts = $post->where('user_id', auth()->user()->id)->get();
        return view('home', compact('posts'));
    }

    public function update($idPost)
    {
        $post = Post::find($idPost);
        
        if(Gate::denies('updatePost', $post))
            abort(403, 'Não autorizado');

        return view('post_update', compact('post'));
    }
}
