<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function postlogin(Request $request){
        dd($request->all());
    }

    public function postregister(Request $request){
        dd($request->all());
    }
}
