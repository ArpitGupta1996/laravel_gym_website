<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(Request $request){
        $data = User::orderBy('id','DESC')->paginate(5);

        return view('users.index', compact('data'))->with('i',($request->input('page', 1) -1)*5);
    }

    public function create(){
        $roles = Role::pluck('name','name')->all();

        return view('users.create', compact('roles'));
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' =>'required',
            'email' => 'required | email | unique:users,email',
            'password' => 'required | same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')->with('success', 'User Created Success');
    }


    public function show($id){
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    public function edit($id){
        $user = User::find($id);

        $roles = Role::pluck('name', 'name')->all();

        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('users.edit', compact('user','roles','userRole'));
    }


    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);

        $input = $request->all();
        if(!empty($input['password'])){ 
            $input['password'] = Hash::make($input['password']);
        }else{
            $input = Arr::except($input,array('password'));    
        }
    
        $user = User::find($id);
        $user->update($input);
    }

    public function destroy($id){
        User::find($id)->delete();

        return redirect()->route('users.index')->with('succes','User deleted successfully');
    }

    public function register(Request $request){
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required | unique:users,email',
            'password' => 'required | max:6',
            'birthdate' => 'required'
        ]);


        if($validator->fails()){

            return response()->json($validator->errors()->first());
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'birthdate' => $request->birthdate,
        ];

        $response = User::create($data);

        return response()->json(['status' => 'true', 'message' => 'User created succseffuly', 'details' => $data]);

        // return $data;
    }

    public function location(){
        return view('location');
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required  | exists:users',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return response()->json(['status' => False, 'message' =>$validator->errors()->first()]); 
        }

        
    }
}