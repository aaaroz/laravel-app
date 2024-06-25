@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="columns-3xl">
                <div class="card">
                    <div class="card-header bg-sky-800 text-white font-semibold">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        <div>
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if(session('success'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('success') }}
                                </div>
                            @endif
                            
                        </div>
                            <div class="mt-3">
                                <div class="flex justify-between">
                                    <h1 class="font-semibold text-2xl">Postinganmu</h1>
                                    <a href="/posts/create"
                                        class="rounded py-2 px-4 bg-sky-800 hover:bg-sky-700 transition-colors duration-300 text-white">Buat
                                        postingan</a>
                                </div>
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
                                                <h2 class="text-xl font-semibold mb-2">{{ $post->title }}</h2>
                                                <p class="text-gray-600 line-clamp-3">{{ $post->content }}</p>
                                                <div class="flex gap-2 mt-3">
                                                    <a href="/posts/show/{{ $post->id }}"
                                                        class="text-blue-500 hover:text-blue-700">
                                                        <x-bx-detail class="w-6 h-6" />
                                                    </a>
                                                    <a href="/posts/edit/{{ $post->id }}"
                                                        class="text-yellow-500 hover:text-yellow-700">
                                                        <x-eva-edit-outline class="w-6 h-6" />
                                                    </a>
                                                    <a href="/posts/{{ $post->id }}"
                                                        class="text-red-500 hover:text-red-700">
                                                        <x-css-trash class="w-6 h-6" />
                                                    </a>
                                                </div>
                                                {{-- <a href="{{ route('posts.show', $post->id) }}" class="text-blue-500 hover:text-blue-700">Baca Selengkapnya</a> --}}
                                            </div>
                                        @endforeach
                                    </div>
                                @else
                                    <p class="text-gray-500">Belum ada post yang dibuat.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
