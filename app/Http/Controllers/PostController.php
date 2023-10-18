<?php

namespace App\Http\Controllers;

use Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $response = Http::get('http://127.0.0.1:9000/api/posts');
        $data = $response->json();
        usort($data['data'], function($a, $b) {
            return strtotime($b['created_at']) - strtotime($a['created_at']);
        });
        
        return view('posts.index', [
            'data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'content'=> 'required',
            'image' => 'required|file|image',
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('/image/posts');
        }

        $postAttributes = [
            'posts_content' => $validatedData['content'],
            'image' => $validatedData['image'],
        ];

        $token = $request->session()->get('token');
        $response = Http::withToken($token)->post('http://127.0.0.1:9000/api/posts', $postAttributes);
        return redirect('/')->with('succes', 'New post has been added!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $response = Http::get('http://127.0.0.1:9000/api/posts/'.$id);
        $data = $response->json()['data'];
        return view('posts.post', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $response = Http::get('http://127.0.0.1:9000/api/posts/'.$id);
        $data = $response->json()['data'];
        return view('posts.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'content'=> 'required',
        ]);

        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validated['image'] = $request->file('image')->store('image/posts');
        }
        else{
            $validated['image'] = $request->oldImage;
        }
        // dd($validated);
        $token = $request->session()->get('token');
        $response = Http::withToken($token)->patch('http://127.0.0.1:9000/api/posts/'.$id, $validated);
        dd($response);
        // Check the response status and handle errors
        if ($response->successful()) {
            // Request was successful, process the response data
            $responseData = $response->json();

        } else {
            // Request failed, print the error message
            dd($response);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $token = $request->session()->get('token');
        $response = Http::withToken($token)->delete('http://127.0.0.1:9000/api/posts/'.$id);
        return redirect('/')->with('succes', 'Post has been deleted!');
    }
}
