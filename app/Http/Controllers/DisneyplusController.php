<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Disneyplus;
use Illuminate\Support\Facades\Validator;
use PDF;

class DisneyplusController extends Controller
{
    public function index(){
        $shows = Disneyplus::all();

        return view('list', compact('shows'));
    }

    public function create(){
        return view('form1');
    }

    public function store(Request $request){
        $validator = $request->validate([
            'show_name' => 'required | max:255',
            'series' => 'required | max:255',
            'lead_actor'=> 'requried | max:255',
        ]);

        Disneyplus::create($validator);

        return redirect('/disneyplus')->with('success', 'Disney Plus created');
    }

    public function downloadPDF($id){
        $show = Disneyplus::find($id);

        $pdf = PDF::loadView('pdf', compact('show'));

        return $pdf->download('disney.pdf');
    }
}
