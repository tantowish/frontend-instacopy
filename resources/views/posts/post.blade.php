@extends('layouts.main')

@section('content')
    <div class="mb-4 max-w-lg mx-auto">
        <div class="flex flex-wrap gap-2 mb-4 items-center">
            <a href="/user/{{ $data['author']['id'] }}">
                <img src="{{ $data['author']['image'] ? asset('storage/' . $data['author']['image']) : asset('storage/image/users/default.jpg') }}" alt="" class="rounded-full w-8 h-8 border-pink-300 border-2">
            </a>
            <a href="/user/{{ $data['author']['id'] }}" class="font-semibold">{{ $data['author']['username'] }}</a>
            <p class="text-sm text-slate-500">{{ \Carbon\Carbon::parse($data['created_at'])->diffForHumans() }}</p>
            @if (session('token'))
            @if (session('data')['id'] == $data['author']['id'])
            <div class="ml-auto flex flex-wrap">
                <a class="" href="/posts/{{ $data['id'] }}/edit">
                    <button type="button" class="text-white bg-gradient-to-r from-emerald-500 via-emerald-600 to-emerald-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-emerald-300 dark:focus:ring-emerald-800 font-medium rounded-lg text-sm px-3 py-2 text-center mr-2 mb-2">
                        <svg class="w-4 h-4 text-white" viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                    </button></a>
                <form action="/posts/{{ $data['id'] }}" method="post">
                    @method('delete')
                    @csrf
                    <button type="submit" class="text-white bg-gradient-to-r from-red-500 via-red-600 to-red-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm px-3 py-2 text-center mr-2 mb-2" onclick="return confirm('Are you sure?')">
                        <svg class="w-4 h-4 text-white" viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round" class="css-i6dzq1"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>
                    </button>
                </form>  
            </div> 
            @endif
            @endif
        </div>
        <div class="flex flex-col items-center bg-white dark:border-gray-700 dark:bg-gray-800">
            <div class="flex flex-wrap gap-2">
                <img class="object-cover w-full h-96 md:h-auto" src="{{ asset('storage/' . $data['image']) }}" alt="">
                <div class="flex flex-col justify-between py-2 leading-normal">
                    <a class="text-base font-semibold" href="/user/{{ $data['author']['id'] }}">{{ $data['author']['username'] }}</a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $data['posts_content'] }}.</p>
                    <p class="font semibold mb-4">Komentar :</p>
                    @php
                        $comments = collect($data['comments'])->sortByDesc('created_at');
                    @endphp
                    @foreach ($data['comments'] as $comment)
                    <div class="mb-2">
                        <div class="flex flex-wrap mb-2 items-center">
                            <a class="mr-2" href="/user/{{ $comment['user']['id'] }}">
                                <img src="{{ $comment['user']['image'] ? asset('storage/' . $comment['user']['image']) : asset('storage/image/users/default.jpg') }}" alt="" class="rounded-full w-8 h-8 border-pink-300 border-2">
                            </a>
                            <a href="/user/{{ $comment['user']['id'] }}" class="font-semibold mr-2">{{ $comment['user']['username'] }}</a>
                            <p class="text-sm text-slate-500">{{ \Carbon\Carbon::parse($comment['created_at'])->diffForHumans() }}</p>
                        </div>
                        <p>{{ $comment['comments_content'] }}</p>
                    </div>
                    <hr class="border-t border-slate-200 w-full mx-auto mb-4">
                    @endforeach
                    <a href="/comments/create/{{ $data['id'] }}">
                        <button type="button" class="text-white bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-pink-300 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2">Add Comment</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

