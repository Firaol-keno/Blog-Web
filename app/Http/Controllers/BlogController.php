<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Category;
class BlogController extends Controller
{
    public function blog(){
        $posts = Post::latest()->take(9)->get();
        $categories = Category::all();

        return view('blog', compact('posts', 'categories'));
    }
}
