<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AutoCompleteController extends Controller
{
    public function index(){
        return view('autocomplete-search');
    }

    public function autocomplete(Request $request){
        $res = Product::select('name')
                        ->where('name','LIKE', '%{$request->term}%')
                        ->get();

        return response()->json($res);
    }
}
