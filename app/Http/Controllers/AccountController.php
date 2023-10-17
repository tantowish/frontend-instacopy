<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AccountController extends Controller
{
    public function profile(Request $request){
        $token = $request->session()->get('token');
        $response = Http::withToken($token)->get('http://127.0.0.1:9000/api/profile');
        $data = $response->json()['data'];
        if ($response->successful()) {
            // Check if the request was successful
            return view('profile.index', compact('data'));
        } else {
            return response()->json(['message' => 'Authentication failed'], 401);
        }
    }

    public function register(){
        return view('register');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'username'=>'required',
            'email' => 'required|email',
            'password'=> 'required',
            'firstName'=>'required',
        ]);
        
        $response = Http::post('http://127.0.0.1:9000/api/register', $validated);
        return redirect('/login')->with('succes', 'Account created, please login');
    }
}
