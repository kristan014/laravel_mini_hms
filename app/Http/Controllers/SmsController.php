<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Nexmo\Laravel\Facade\Nexmo;


class SmsController extends Controller
{
    //
    public function index(){
        Nexmo::message()->send([
            'to' => '+639489024393',
            'from' => '+639489024393',
            'text' => 'Text SMS',
        ]);

        echo "Message Sent!";
    }
}
