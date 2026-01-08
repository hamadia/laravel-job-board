<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $data = Comment::cursorPaginate(10);

        return view('comment.index', ['comments' => $data, "pageTitle" => "Comments"]);
    }

    public function create()
    {
        return view('comment.create',["pageTitle"=>"Blog - Create New Comment"]);
    }

    public function store(Request $request)
    {
        //ToDo will be completed in forms section
    }

    public function show(string $id)
    {
        $comments = Comment::findOrFail($id);
        return view('comment.show',["comment"=>$comments,"pageTitle"=>"Blog - View Comments"]);

    }

    public function edit(string $id)
    {
        return view('comment.edit',["pageTitle"=>"Edit Comment"]);
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
