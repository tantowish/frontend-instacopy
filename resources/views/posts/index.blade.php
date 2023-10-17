@extends('layouts.main')

@section('content')

<div class="mb-8 max-w-lg mx-auto">
    @if (session()->has('succes'))
    <div class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
          <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div>
          <span class="font-medium">Success </span> {{ session('succes') }}
        </div>
      </div>
    @endif
    @if (session('token'))
    <a class="mb-8" href="/posts/create">
        <button type="button" class="text-white bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-300 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Create</button>
    </a>
        
    @endif 
    @foreach ($data['data'] as $item)
    <div class="mb-4">
        <div class="flex flex-wrap gap-2 mb-4 items-center">
            <a href="/user/{{ $item['author']['id'] }}">
                <img src="{{ $item['author']['image'] ? asset('storage/' . $item['author']['image']) : asset('storage/image/users/default.jpg') }}" alt="" class="rounded-full w-8 h-8 border-pink-300 border-2">
            </a>
            <a href="/user/{{ $item['author']['id'] }}" class="font-semibold">{{ $item['author']['username'] }}</a>
            <p class="text-sm text-slate-500">{{  \Carbon\Carbon::parse($item['created_at'])->diffForHumans() }}</p>
            @if (session('data')['id'] == $item['author']['id'])
            <div class="ml-auto flex flex-wrap">
                <a class="ml-auto" href="/posts/{{ $item['id'] }}/edit">
                    <button type="button" class="text-white bg-gradient-to-r from-emerald-500 via-emerald-600 to-emerald-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-emerald-300 dark:focus:ring-emerald-800 font-medium rounded-lg text-sm px-3 py-2 text-center mr-2 mb-2">
                        <svg class="w-4 h-4 text-white" viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                    </button></a>
                <form action="/posts/{{ $item['id'] }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-3 py-2 text-center mr-2 mb-2" onclick="return confirm('Are you sure?')">
                        <svg class="w-4 h-4 text-white" viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                    </button>
                </form>  
            </div> 
            @endif
        </div>
        <div class="flex flex-col items-center bg-white dark:border-gray-700 dark:bg-gray-800">
            <div class="flex flex-wrap gap-2">
                <img class="object-cover w-full h-96 md:h-auto" src="{{ asset('storage/' . $item['image']) }}" alt="">
                <div class="flex flex-col justify-between py-2 leading-normal">
                    <a class="text-base font-semibold" href="/user/{{ $item['author']['id'] }}">{{ $item['author']['username'] }}</a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $item['posts_content'] }}.</p>
                    <a href="/posts/{{ $item['id'] }}">
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Lihat semua {{ $item['comment_total'] }} komentar.</p>
                    </a>
                </div>
            </div>
            <hr class="border-t border-slate-200 w-full mx-auto mb-4">
        </div>
    </div>
    @endforeach
      
</div>

@endsection