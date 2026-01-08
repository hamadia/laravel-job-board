<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $data = Post::cursorPaginate(10);

        return view('post.index', ['posts' => $data, "pageTitle" => "Blog"]);
    }

    public function create()
    {
        return view('post.create',['pageTitle'=>'Blog - Create New Post']);
    }

    public function store(Request $request)
    {
        // ToDo this will be completed in the forms section
    }

    public function show(string $id)
    {
        $post = Post::findOrFail($id);
        return view('post.show',['post'=>$post,"pageTitle" => $post->title]);
    }
    

    public function edit(string $id)
    {
      return view('post.edit',['pageTitle'=>'Blog - Edit Post']);
    }

    public function update(Request $request, string $id)
    {
        // ToDo this will be completed in the forms section
    }

    public function destroy(string $id)
    {
        //ToDo will be completed in forms section
    }
}
