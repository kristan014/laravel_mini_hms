<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function __construct(){
        $this->middleware(['auth','prevent-back-history']);

    }
    public function index(){
        // dd(auth()->user());
    
        return view('dashboard');
        \Session::get('tokenVariable');
        }
}
