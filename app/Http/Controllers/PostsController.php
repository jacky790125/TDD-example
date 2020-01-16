<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }


    public function index()
    {
        $data = $this->post::all();

        return view('post', ['posts' => $data]);
    }

    public function show()
    {
        return view('form');
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->content = $request->input('content');
        $post->save();
    }

    public function create(Request $request)
    {
        $post = new Post();
        $post->content = $request->input('content');
        // Get the currently authenticated user's ID...
        $post->user_id = Auth::id();
        $post->save();
    }
}
