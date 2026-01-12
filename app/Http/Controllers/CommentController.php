<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogCommentRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use function PHPUnit\Framework\returnArgument;

class CommentController extends Controller
{
    public function index()
    {
return redirect('/blog');
    }

    public function create()
    {
        return redirect('/blog');
    }

    public function store(BlogCommentRequest $request)
    {
        $post = Post::findOrFail($request->input('post_id'));

        $comment = new Comment();

        $comment->content = $request->input('content');
        $comment->author = $request->input('author');
        $comment->post_id = $request->input('post_id');

        $comment->save();

        return redirect("/blog/{$post->id}")->with('success', 'Your comment published successfully');
    }

    public function show(string $id)
    {
       return redirect('/blog');
    }

    public function edit(string $id)
    {
        return view('comment.edit', ["pageTitle" => "Edit Comment"]);
    }

    public function update(Request $request, string $id)
    {
        //ToDo
    }

    public function destroy(string $id)
    {
        //ToDo
    }
}
