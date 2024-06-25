<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Auth;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

     // Menampilkan daftar semua post
     public function index()
     {
        $posts = Post::where('author_id', Auth::user()->id)->get();
        return view('dashboard', compact('posts'));
     }
 
     // Menampilkan detail post berdasarkan ID
     public function show($id)
     {
        $post = Post::with('author', 'category')->find($id);
         if (!$post) {
             return abort(404);
         }
         return view('posts.show', compact('post'));
     }
 
     // Menambahkan post baru
     public function create()
     {  
        $categories = Category::all();
         return view('posts.create', compact('categories'));
     }
 
     // Menyimpan post baru
     public function store(Request $request)
     {
         $validatedData = $request->validate([
             'title' => 'required|max:255',
             'content' => 'required',
             'category_id' => 'required|integer|exists:categories,id',
         ]);
 
         $author_id = Auth::user()->id;
         $post = new Post;
         $post->title = $validatedData['title'];
         $post->content = $validatedData['content'];
         $post->author_id = $author_id;
         $post->category_id = $validatedData['category_id'];
         $post->published_at = now();
         $post->save();
 
         return redirect()->route('dashboard')->with('success', 'Post berhasil ditambahkan!');
     }
 
     // Menampilkan form edit post berdasarkan ID
     public function edit($id)
     {
         $post = Post::find($id);
         $categories = Category::all();
         if (!$post) {
             return abort(404);
         }
         return view('posts.edit', compact('post') , compact('categories'));
     }
 
     // Memperbarui post berdasarkan ID
     public function update(Request $request, $id)
     {
         $validatedData = $request->validate([
             'title' => 'required|max:255',
             'content' => 'required',
             'category_id' => 'required|integer|exists:categories,id',
         ]);
 
         $post = Post::find($id);
         if (!$post) {
             return abort(404);
         }
         $author_id = Auth::user()->id;
         $post->title = $validatedData['title'];
         $post->content = $validatedData['content'];
         $post->author_id = $author_id;
         $post->category_id = $validatedData['category_id'];
         $post->save();
 
         return redirect()->route('dashboard')->with('success', 'Post berhasil diperbarui!');
     }
 
     // Menghapus post berdasarkan ID
     public function destroy($id)
     {
         $post = Post::find($id);
         if (!$post) {
             return abort(404);
         }
         $post->delete();
 
         return redirect()->route('dashboard')->with('success', 'Post berhasil dihapus!');
     }
}
