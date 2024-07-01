<?php
// app/Http/Controllers/PostController.php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{    
    public function create()
    {
        $categories = Category::all(); // Fetch categories
        return view('post.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = auth()->id();
        $post->category_id = $request->category_id;
        $post->is_featured = $request->has('is_featured');

        if ($request->hasFile('thumbnail')) {
            $filename = time() . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('thumbnails'), $filename);
            $post->thumbnail = $filename;
        }

        $post->save();

        return redirect()->route('post.create')->with('success', 'Post created successfully.');
    }

    public function show($id)
    {
        $post = Post::with('user', 'category')->findOrFail($id);
        return view('post.show', compact('post'));
    }


    //posts that are in the same category displayed
    public function categoryPosts($id)
    {
        $category = Category::findOrFail($id);
        $posts = Post::where('category_id', $id)->orderBy('created_at', 'desc')->get();
        return view('category.posts', compact('category', 'posts'));
    }

    public function index()
    {
        $featured = Post::with(['user', 'category'])
                        ->where('is_featured', 1)
                        ->first();

        $posts = Post::with(['user', 'category'])
                     ->orderBy('created_at', 'desc')
                     ->limit(9)
                     ->get();

        return view('home', compact('featured', 'posts'));
    }

}
