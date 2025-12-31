<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $data = Comment::all();

        return view('comment.index', ['comments' => $data, "pageTitle" => "Blog"]);
    }

    public function create()
    {
        // $comment = Comment::create(
        //     [
        //         'author' => 'Aliaa',
        //         'content'=>'This is test comment',
        //         'post_id'=>2,
        //     ]
        // );

        Comment::factory(5)->create();
        return redirect('/comments');
    }
}
