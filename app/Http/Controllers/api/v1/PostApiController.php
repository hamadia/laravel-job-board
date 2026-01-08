<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostApiController extends Controller
{
    public function index()
    {
        $data = Post::paginate(25);
        return response($data,200);
    }

    public function store(Request $request)
    {
        $data = Post::create($request->all());
        return response([$data,'message'=>'Post created successfully'],201);
    }

    public function show(string $id)
    {
        $data = Post::find($id);
        if(!$data){
            return response(["message"=>"Post not found!"],404) ;
        }
        return response([$data,'message'=>'This is your Post'],200);
    }

    public function update(Request $request, string $id)
    {
        $data = Post::find($id);
        if(!$data){
            return response(["message"=>"Post not found!"],404) ;
        }
        $data->update($request->all());
        return response([$data,'message'=>'Post updated successfully'],200);
    }

    public function destroy(string $id)
    {
        $data = Post::find($id);
        if(!$data){
            return response(["message"=>"Post not found!"],404) ;
        }
        $data->delete();
        return response([null,'message'=>'Post deleted successfully'],204);
    }
}