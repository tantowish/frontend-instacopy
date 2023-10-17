<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AuthenticationController extends Controller
{
    public function login(){
        return view('login');
    }

    public function auth(Request $request){
        $validated = $request->validate([
            'email' => ['required'],
            'password'=> ['required'],
        ]);
        
        $response = Http::post('http://127.0.0.1:9000/api/login', $validated);

        // Check if the request was successful (status code 2xx)
        if ($response->successful()) {
            // Get the token from the response content
            $token = $response->body();
    
            $request->session()->put('token', $token);

            $responseProfile = Http::withToken($token)->get('http://127.0.0.1:9000/api/profile');

            if ($responseProfile->successful()) {
                // Check if the request was successful
                $data = $responseProfile->json()['data'];
                $request->session()->put('data', $data);
            } else {
                return response()->json(['message' => 'Authentication failed'], 401);
            }

  
            return redirect('/');
        } else {
            // Handle the case where the authentication request was not successful
            // You can access error messages or response status code for further handling
            return response()->json(['message' => 'Authentication failed'], 401);
        }
    }
    public function logout(Request $request)
    {
        if ($request->session()->has('token')) {
            $token = $request->session()->get('token');
            $response = Http::withToken($token)->get('http://127.0.0.1:9000/api/logout');
            if ($response->successful()) {
                $request->session()->forget(['token', 'data']);
                return redirect('/login');
            } else {
  
                return response()->json(['message' => 'Logout failed'], 401);
            }
        }

        // If the user is not authenticated, you can redirect to the login page or handle it accordingly.
        return redirect('/');
    }
}
