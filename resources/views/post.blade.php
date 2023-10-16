@extends('layouts.main')

@section('content')
    <div class="mb-4 flex flex-wrap max-w-lg mx-auto">
        <div class="flex flex-wrap gap-2 mb-4 items-center">
            <a href="/user/{{ $data['author']['id'] }}">
                <img src="{{ $data['author']['image'] ? asset('storage/' . $data['author']['image']) : asset('storage/image/users/default.jpg') }}" alt="" class="rounded-full w-8 h-8 border-pink-300 border-2">
            </a>
            <a href="/user/{{ $data['author']['id'] }}" class="font-semibold">{{ $data['author']['username'] }}</a>
            <p class="text-sm text-slate-500">{{ \Carbon\Carbon::parse($data['created_at'])->diffForHumans() }}</p>
        </div>
        <div class="flex flex-col items-center bg-white dark:border-gray-700 dark:bg-gray-800">
            <div class="flex flex-wrap gap-2">
                <img class="object-cover w-full h-96 md:h-auto" src="{{ asset('storage/' . $data['image']) }}" alt="">
                <div class="flex flex-col justify-between py-2 leading-normal">
                    <a class="text-base font-semibold" href="/user/{{ $data['author']['id'] }}">{{ $data['author']['username'] }}</a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ $data['posts_content'] }}.</p>
                    <a href="/posts/{{ $data['id'] }}">
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
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

