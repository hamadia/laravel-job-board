<?php

namespace App\Http\Controllers;

use App\Models\tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $data = Tag::cursorPaginate(10);

        return view('tag.index', ['tags' => $data, "pageTitle" => "Tags"]);
    }

    public function create()
    {
        return view('tag.create',["pageTitle"=>"Blog - Create Tag"]);
    }

    public function store(Request $request)
    {
        //ToDo
    }

    public function show(string $id)
    {
        $tag = Tag::findOrFail($id);
        return view('tag.show',["tag"=>$tag,"pageTitle"=>"Blog - View Tag"]);
    }

    public function edit(string $id)
    {
        return view('tag.edit',["pageTitle"=>"Blog - Edit Tag"]);
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
