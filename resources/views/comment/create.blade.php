@extends('layouts.main')

@section('content')
<div class="max-w-lg mx-auto">
    <h1 class="mb-8 text-2xl font-bold text-pink-500 text-center">Create Post</h1>
    <form action="/posts" method="POST" enctype="multipart/form-data">
      @csrf
        <div class="mb-6">
          <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Caption</label>
          <input name="content" type="text" id="content" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-pink-500 dark:focus:border-pink-500 dark:shadow-sm-light" placeholder="" required value='{{ old('content') }}'>
        </div>
        <div class="mb-6">
            <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Upload Image</label>
            <img class="img-preview max-h-[250px] mb-5">
            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="image" name="image" type="file" onchange="previewImage()">
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</p>
        </div>
        <button type="submit" class="text-white bg-pink-500 hover:bg-pink-600 focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-pink-600 dark:hover:bg-pink-700 dark:focus:ring-pink-800">Create</button>
      </form>
</div>

@endsection