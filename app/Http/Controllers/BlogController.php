<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
class BlogController extends Controller
{
    public function blog()
    {
        $posts = Post::with('user', 'category')->get();
        $categories = Category::all();

        if ($posts->isEmpty()) {
            return 'No posts found';
        }

        return view('blog', compact('posts', 'categories'));
    }
    
}
