<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $posts = Post::where('user_id', auth()->user()->id)->get();
        return view('dashboard', compact('posts'));
    }
}
