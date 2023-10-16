<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function login(){
        return view('login');
    }

    public function store(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);
    }
}
