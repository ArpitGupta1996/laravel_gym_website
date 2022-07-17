<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(){
        $posts = Post::orderBy("id", "desc")->paginate(5);

        return view('posts', compact('posts'));
    }

    public function create(){
        return view('create1');
    }

    public function store(Request $request){
        $post = [
            'title' => $request->title,
            'body' => $request->body
        ];

        $post = Post::create($post);

        return back()->with('success', 'Post has been created');
    }
}
