<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostGuzzleController extends Controller
{
    public function index(){
        $response = Http::get('https://api.pexels.com/videos/');

        $jsonData = $response->json();

        dd($jsonData);
    }

    public function store(){
        $response =Http::post('https://api.pexels.com/videos/', [
            'title' => 'This is test from tutsmake.com',
            'body' => 'This is test from tutsmake.com as body',
        ]);

        dd($response->successful());
    }
}
