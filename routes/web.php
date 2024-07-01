<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\EditPostController;
use App\Http\Controllers\ManageUsersController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ManageCategoryController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');



//Route::get('/', function () {
   //return view('welcome')
//});

Route::get('/index', [HomeController::class, 'home']);

Route::get('/blog', [BlogController::class, 'blog']);

Route::get('/', [PageController::class, 'index']);

Route::get('/signin', [SigninController::class, 'index'])->name('signin');
Route::post('/signin', [SigninController::class, 'login']);
//Route::post('/logout', [SigninController::class, 'logout'])->name('logout');

Route::get('/login', function () {
   Auth::login();
    return redirect('/'); // Redirect to home page
})->name('login');


Route::get('/signup', [SignupController::class, 'index']);
Route::post('/signup', [SignupController::class, 'register'])->name('signup');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/add-post', [DashboardController::class, 'addPost'])->name('dashboard.add-post');
    Route::get('/dashboard/add-user', [DashboardController::class, 'addUser'])->name('dashboard.add-user')->middleware('is_admin');
    Route::get('/dashboard/add-category', [DashboardController::class, 'addCategory'])->name('dashboard.add-category');

    Route::get('/dashboard/edit-user/{id}', [ManageUsersController::class, 'edit'])->name('dashboard.edit-user');
    Route::put('/dashboard/edit-user/{id}', [ManageUsersController::class, 'update'])->name('dashboard.update-user');
    Route::get('/dashboard/manage-users', [ManageUsersController::class, 'index'])->name('dashboard.manage-users');
    Route::delete('/dashboard/delete-user/{id}', [ManageUsersController::class, 'destroy'])->name('dashboard.delete-user');
    
    
    Route::get('/dashboard/manage-categories', [ManageCategoryController::class, 'index'])->name('dashboard.manage-categories');
    Route::get('/dashboard/edit-category/{id}', [ManageCategoryController::class, 'edit'])->name('dashboard.edit-category');
    Route::put('/dashboard/edit-category/{id}', [ManageCategoryController::class, 'update'])->name('dashboard.update-category');    
    Route::delete('/dashboard/delete-category/{id}', [ManageCategoryController::class, 'destroy'])->name('dashboard.delete-category');

    Route::get('/post/edit-post/{id}', [EditPostController::class, 'edit'])->name('post.edit-post');
    Route::post('/post/edit-post/{id}', [EditPostController::class, 'update'])->name('post.update-post');
    Route::delete('/post/delete-post/{id}', [EditPostController::class, 'destroy'])->name('post.delete-post');
});











Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');



Route::middleware(['auth'])->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});


Route::get('/blog', function () {
    return view('blog');
})->name('blog');


//Route::get('/index', [PostController::class, 'index'])->name('home');
Route::get('/posts/create', [PostController::class, 'create'])->name('post.create');
Route::post('/posts', [PostController::class, 'store'])->name('post.store');
Route::post('/post/edit', [PostController::class, 'edit'])->name('post.edit');

Route::get('/category/{id}', [CategoryController::class, 'posts'])->name('category.posts');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');

Route::get('/', [PostController::class, 'index']);
Route::get('/post/{id}', [PostController::class, 'show']);



