<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Post;
use App\Models\Category;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        $categories = Category::all();
        return view('welcome', compact('posts'));
    }
    public function home()
    {
        return view('home');
    }
    public function detail($id)
    {
        $post = Post::find($id);
        if (!$post) {
            return abort(404);
        }
        return view('detail', compact('post'));
    }
}
