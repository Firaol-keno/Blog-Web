<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function addPost()
    {
        return view('dashboard.add-post');
    }

    public function managePosts()
    {
        $posts = Post::all();
        return view('dashboard.manage-posts', compact('posts'));
    }

    public function addUser()
    {
        return view('dashboard.add-user');
    }

    public function manageUsers()
    {
        $users = User::all();
        return view('dashboard.manage-users', compact('users'));
    }

    public function addCategory()
    {
        return view('dashboard.add-category');
    }

    public function manageCategories()
    {
        $categories = Category::all();
        return view('dashboard.manage-categories', compact('categories'));
    }
}
