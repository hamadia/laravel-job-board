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

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('post.show',['post'=>$post,"pageTitle" => $post->title]);
    }
    public function create()
    {
        // $post = Post::create(
        //     [
        //         'title' => 'My first post',
        //         'body' => 'This is to test Uuid ',
        //         'author' => 'Aliaa',
        //         'published' => true,
        //     ]
        // );

        Post::factory(100)->create();
        return redirect('/blog');
    }
    public function delete(){
        Post::destroy(2);
    }
}
