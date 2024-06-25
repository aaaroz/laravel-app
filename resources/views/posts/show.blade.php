@extends('layouts.app')
@section('content')
<div class="container mt-4">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-semibold">Detail Post</h1>
        <a href="{{ route('dashboard') }}" class="bg-gray-800 text-white font-bold py-2 px-4 rounded-md hover:bg-gray-700">Kembali ke Daftar Post</a>
    </div>
    <div class="bg-white p-4 rounded-md shadow-sm border">
      <div class="flex justify-between items-center mb-4">
        <h2 class="text-lg font-bold">{{ $post->title }}</h2>
        <span class="text-xs px-2 py-1 bg-sky-300 text-sky-800 rounded">{{ $post->category->name }}</span>
      </div>

        <p class="text-gray-600 mb-4">{{ $post->content }}</p>

        <div class="flex items-center mb-4">
            <div class="rounded-full w-10 h-10 bg-sky-800 flex justify-center items-center mr-2">
            <span class="text-white text-2xl">{{ $post->author->name[0] }}</span>
            </div>

            <div class="ml-2">
                <p class="text-gray-700 font-bold">{{ $post->author->name }}</p>
                <p class="text-gray-600">{{ $post->created_at->diffForHumans() }}</p>
            </div>
        </div>
    </div>
</div>
@endsection