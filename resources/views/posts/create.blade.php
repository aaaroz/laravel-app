@extends('layouts.app')
@section('content')
<div class="container">
    <div class="flex justify-center">
        <div class="columns-3xl">
            <div class="card">
                <div class="card-header bg-sky-800 text-white font-semibold">Create Post</div>

                <div class="card-body">
                    <form action="{{url('posts') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                
                        <div class="mb-4">
                            <label for="title" class="block text-gray-700 font-medium mb-2">Judul Post</label>
                            <input type="text" id="title" name="title" class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-800">
                            @error('title')
                                <p class="text-red-500 mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                
                        <div class="mb-4">
                            <label for="content" class="block text-gray-700 font-medium mb-2">Konten Post</label>
                            <textarea id="content" name="content" rows="4" class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-800"></textarea>
                            @error('content')
                                <p class="text-red-500 mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                
                        <div class="mb-4">
                            <label for="category_id" class="block text-gray-700 font-medium mb-2">Kategori</label>
                            <select id="category_id" name="category_id" class="w-full p-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-sky-800">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-red-500 mt-2">{{ $message }}</p>
                            @enderror
                        </div>
                
                        <button type="submit" class="rounded py-2 px-4 bg-sky-800 hover:bg-sky-700 transition-colors duration-300 text-white" >Tambah Post</button>
                        <a href="{{ url('dashboard') }}" class="ml-2 rounded py-2 px-4 bg-slate-800 hover:bg-slate-700 transition-colors duration-300 text-white" >Kembali</a>

                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>

@endsection