<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

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

    public function store(Request $request)
    {
        $post = new Post();
        $post->content = $request->input('content');
        $post->save();
    }
}
