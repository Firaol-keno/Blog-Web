<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\profile;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Category;
class HomeController extends Controller
{
    public function index()
{
    $featuredPost = Post::where('is_featured', true)->with('category', 'user')->first();
    $posts = Post::with('category', 'user')->orderBy('created_at', 'desc')->get();
    $categories = Category::all();

    return view('home', compact('featuredPost', 'posts', 'categories'));
}

}
