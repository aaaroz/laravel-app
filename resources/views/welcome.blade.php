@extends('layouts.app')
@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-2xl font-bold mb-4">Postingan Terbaru!</h1>

    @if (count($posts) > 0)
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-3">
        @foreach ($posts as $post)
            <div class="bg-white shadow-md rounded-md p-4 border">
                <div class="flex items-center justify-between">
                    <span class="text-xs mb-2 px-2 py-1 bg-sky-300 text-sky-800 rounded">
                        {{ $post->category->name }}
                    </span>
                    <span class="text-xs text-gray-500">
                        {{ $post->created_at->diffForHumans() }}
                    </span>
                </div>
                <h2 class="text-xl font-semibold mb-2 line-clamp-2">{{ $post->title }}</h2>
                <p class="text-gray-600 line-clamp-4">{{ $post->content }}</p>
                <div class="flex items-center justify-between mt-4">
                    <div class="flex items-center">
                        <div class="rounded-full w-7 h-7 bg-sky-800 flex justify-center items-center mr-2">
                            <span class="text-white text-lg">{{ $post->author->name[0] }}</span>
                        </div>
                     <span class="font-semibold">{{ $post->author->name }}</span>
                    </div>
                        <a href="{{ route('detail', $post->id) }}" class="text-blue-500 hover:text-blue-700 hover:underline underline-offset-2">Baca Selengkapnya</a>
                </div>
            </div>
            @endforeach
            
    @else
        <p class="text-gray-500">Belum ada post yang dibuat.</p>
    @endif
</div>
@endsection