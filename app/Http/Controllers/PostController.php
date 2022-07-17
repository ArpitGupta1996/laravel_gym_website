<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

class PostController extends Controller
{
    public function index(){
        return view('posts');
    }

    public function store(Request $request){
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'author' => Auth::id()
        ]);
        return redirect()->back();
    }
}
