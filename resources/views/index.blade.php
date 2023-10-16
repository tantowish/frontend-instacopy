@extends('layouts.main')

@section('content')

<div class="mb-8 max-w-lg mx-auto">
    @foreach ($data['data'] as $item)
    <div class="mb-4">
        <div class="flex flex-wrap gap-2 mb-4 items-center">
            <a href="/user/{{ $item['author']['id'] }}">
                <img src="{{ $item['author']['image'] ? asset('storage/' . $item['author']['image']) : asset('storage/image/users/default.jpg') }}" alt="" class="rounded-full w-8 h-8 border-pink-300 border-2">
            </a>
            <a href="/user/{{ $item['author']['id'] }}" class="font-semibold">{{ $item['author']['username'] }}</a>
            <p class="text-sm text-slate-500">{{  \Carbon\Carbon::parse($item['created_at'])->diffForHumans() }}</p>
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