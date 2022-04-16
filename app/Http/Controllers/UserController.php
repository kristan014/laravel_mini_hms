<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        // dd($request->email);


        // validate
        $this->validate($request,[
            'email'=>['required', 'unique:users','email', 'max:255'],
            'password'=>'required|confirmed',
        ]);

        // create
        User::create([
            'name'=>'Kian',
            'email' =>$request->email,
            'password'=>Hash::make($request->password),
        ]);

        
        auth()->attempt($request->only('email', 'password'));

        // redirect
        return redirect()->route('dashboard');

        
        
    }
}
