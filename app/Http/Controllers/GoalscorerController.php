<?php

namespace App\Http\Controllers;

use App\Models\Goalscorer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GoalscorerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'club' => 'required',
            'country' => 'required',
            'score' => 'required'
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $goalscorer = new Goalscorer();
        $goalscorer->name = $request->get('name');
        $goalscorer->club = $request->get('club');
        $goalscorer->country = $request->get('country');
        $goalscorer->score = $request->get('score');
        $goalscorer->save();

        return response()->json(['success' => 'Data added succesfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
