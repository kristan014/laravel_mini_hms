<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    //

    public function __construct(){
        $this->middleware(['auth','prevent-back-history']);

    }

    public function index(){
        return view('room_type');
    }
}
