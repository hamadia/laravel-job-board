<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $data = Tag::all();

        return view('tag.index', ['tags' => $data, "pageTitle" => "Tags"]);
    }

    public function create()
    {
        $tag = Tag::create(
            [
                'title' => 'Css',
            ]
        );
        return redirect('/tags');
    }

    public function testManyToMany(){
        $post3=Post::find(3);
        $post1=Post::find(1);

        $post3->tags()->attach([1,2]);
        $post1->tags()->attach([1]);

        return response()->json([
            'post3'=>$post3->tags,
            'post1'=>$post1->tags,
        ]);
    }
}
