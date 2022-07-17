<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    public function index(){
        return view('home');
    }

    public function about(){
        return view('about');
    }

    public function service(){
        return view('service');
    }

    public function testimonial(){
        return view('testmonial');
    }

    public function contact(){
        return view('contact');
    }

    public function save(Request $request){

        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator)->errors()->first();
        }

        else{
            $contact_obj = new Contact;

            $contact_obj->name = $request->name;
            $contact_obj->email = $request->email;
            $contact_obj->phone = $request->phone;
            $contact_obj->message = $request->message;

            $contact_obj->save();
        }
    }


    public function email(){

        // $get_name = DB::table('users')
        //                 ->select('name')
        //                 ->get();
        

        $get_name = User::get('name');
        // dd($get_name);
        return view('dashboard', compact('get_name'));
    }

    public function index1(Request $request){
        return view('autocomplete');
    }


    public function multipleselect(){
        return view('multiselect');
    }
}
