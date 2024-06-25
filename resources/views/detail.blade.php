@extends('layouts.app')
@section('content')
    <div class="container mx-auto px-4 py-3 flex flex-col">
        <div class="flex justify-between items-center mb-3">
            <span class="text-xs px-2 py-1 bg-sky-300 text-sky-800 rounded">{{ $post->category->name }}</span>
            <span class="text-xs text-gray-500">
                {{ $post->created_at->diffForHumans() }}
            </span>
        </div>
        <section>
            <div class="mb-4">
                <h1 class="text-2xl font-bold">{{ $post->title }}</h1>
                <h6 class="text-sm">By <span class="font-semibold hover:text-sky-500">{{ $post->author->name }}</span> in <span
                        class="font-semibold hover:text-sky-500">{{ $post->category->name }}</span> |
                    {{ $post->created_at->format('M d, Y') }}</h6>
            </div>
            <p class="text-gray-600">{{ $post->content }}</p>
            <a href="javascript:history.back()" class="mt-4 flex items-center text-blue-500 hover:text-blue-700 hover:underline underline-offset-2 transition-colors duration-200"> 
                <x-bx-arrow-back class="w-4 h-4" /> Kembali ke home
            </a>
        </section>
    </div>
@endsection
