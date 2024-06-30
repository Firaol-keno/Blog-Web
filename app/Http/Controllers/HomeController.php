<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\profile;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home() {
        $featured = Post::where('is_featured', 1)->first();
        $posts = Post::latest()->take(9)->get();
        $categories = Category::all();

        return view('home', compact('featured', 'posts', 'categories'));
    }
}
