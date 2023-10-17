@extends('layouts.main')

@section('content')
<div class="max-w-xl mx-auto mt-8">
    <div class="flex flex-wrap justify-center gap-4 mb-12">
        <img class="w-32 h-32 md:w-40 md:h-40 rounded-full border-pink-300 border-4 sm:mr-24" src="{{ $data['image'] ? asset('storage/' . $data['image']) : asset('storage/image/users/default.jpg') }}" alt="user photo">
        <div class="w-1/2">
            <div class="flex flex-wrap justify-between mb-8">
                <h1 class="font-semibold text-xl">{{ $data['username'] }}</h1>
                <a href="">Setting</a>
            </div>
            <p class="mb-8">{{ count($data['posts']) }} kiriman</p>
            <p>{{ $data['firstName'] . " ". $data['lastName'] }}</p>
        </div>
    </div>
    <hr class="mb-8">
    <div class="flex flex-wrap gap-4">
        @foreach ($data['posts'] as $item)
        <div class="mb-4 w-1/3">
            <a href="/posts/{{ $item['id'] }}">
                <div class="relative max-w-xs overflow-hidden bg-cover bg-no-repeat">
                    <img class="object-cover w-full h-auto  " src="{{ asset('storage/' . $item['image']) }}" alt="">
                    <div
                      class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-black bg-fixed opacity-0 transition duration-300 ease-in-out hover:opacity-30"></div>
                  </div>   
            </a>
        </div>
        @endforeach
    </div>
    
</div>
@endsection