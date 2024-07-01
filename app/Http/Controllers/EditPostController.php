<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class EditPostController extends Controller
{
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::all();

        return view('post.edit-post', compact('post', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'body' => 'required|string',
            'thumbnail' => 'nullable|image',
            'is_featured' => 'boolean',
        ]);

        if ($request->hasFile('thumbnail')) {
            $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
            $post->thumbnail = $thumbnailPath;
        }

        $post->update([
            'title' => $validated['title'],
            'category_id' => $validated['category_id'],
            'body' => $validated['body'],
            'is_featured' => $request->has('is_featured'),
        ]);

        return redirect()->route('dashboard')->with('success', 'Post updated successfully.');
    }

    public function destroy($id)
{
    $post = Post::findOrFail($id);
    $post->delete();

    return redirect()->route('dashboard')->with('success', 'Post deleted successfully.');
}
}
