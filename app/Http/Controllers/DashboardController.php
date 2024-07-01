<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
         $currentUser = Auth::user();
        $posts = Post::where('user_id', $currentUser->id)->orderBy('id', 'DESC')->get();
        $categories = Category::all();

        return view('dashboard.index', compact('posts', 'categories'));
    }

    public function addPost()
    {
        $categories = Category::all(); // Fetch categorie
        return view('dashboard.add-post', compact('categories'));
    }

    public function managePosts()
    {
        $current_user_id = Auth::id();
        $posts = Post::where('author_id', $current_user_id)->orderBy('id', 'desc')->get();
        return view('dashboard.manage-posts', compact('posts'));
    }

    public function addUser()
    {
        return view('dashboard.add-user');
    }

    public function manageUsers()
    {
        // Fetch users for admin
        //$users = User::all();
       // return view('dashboard.manage-users', compact('users'));
       return view('dashboard.manage-users');
    }

    public function addCategory()
    {
        return view('dashboard.add-category');
    }

    public function manageCategories()
    {
        //$categories = Category::all();
        //return view('dashboard.manage-categories', compact('categories'));
        return view('dashboard.manage-categories');
    }

    
}
