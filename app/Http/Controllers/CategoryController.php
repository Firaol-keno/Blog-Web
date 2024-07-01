<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Category::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('dashboard.add-category')->with('success', 'Category created successfully.');
    }

    public function posts($id)
    {
        $category = Category::with('posts.user')->findOrFail($id);
        $posts = $category->posts;

        return view('category.posts', compact('category', 'posts'));
    }
}
