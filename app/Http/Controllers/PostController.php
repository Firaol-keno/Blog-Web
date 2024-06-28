<?php
// app/Http/Controllers/PostController.php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
            'thumbnail' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = auth()->id();
        $post->is_featured = $request->has('is_featured');

        if ($request->hasFile('thumbnail')) {
            $filename = time() . '.' . $request->thumbnail->extension();
            $request->thumbnail->move(public_path('thumbnails'), $filename);
            $post->thumbnail = $filename;
        }

        $post->save();

        return redirect()->route('posts.create')->with('success', 'Post created successfully.');
    }
}
