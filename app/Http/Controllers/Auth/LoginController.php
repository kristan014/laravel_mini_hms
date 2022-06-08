<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Session;

class LoginController extends Controller
{
    //
    public function __construct(){
        $this->middleware(['guest']);
    }
    //
    //
    public function index(){
        return view('auth.login');
    }

    public function store(Request $request){
        $this->validate($request,[
            'email'=>['required','email', 'max:255'],
            'password'=>'required',
        ]);

        if(!auth()->attempt($request->only('email', 'password'))){
            return back()->with('status','Invalid login details');
        }

        $user = User::where('email', $request['email'])->first();

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];
        
        \Session::put('tokenVariable', $response['token']);;
        // return response($response, 201);

        // redirect
        return redirect()->route('dashboard');
    }

    // sign in with google
    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        $user = Socialite::driver('google')->user();
 
        // $user->token;
    }
 
}
