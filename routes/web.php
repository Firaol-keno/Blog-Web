<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PostController;

//Route::get('/', function () {
   //return view('welcome')
//});

Route::get('/', [HomeController::class, 'index']);

Route::get('/signin', [SigninController::class, 'index'])->name('signin');
Route::post('/signin', [SigninController::class, 'login']);
//Route::post('/logout', [SigninController::class, 'logout'])->name('logout');


Route::get('/signup', [SignupController::class, 'index']);
Route::post('/signup', [SignupController::class, 'register'])->name('signup');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/add-post', [DashboardController::class, 'addPost'])->name('dashboard.add-post');
    Route::get('/dashboard/manage-posts', [DashboardController::class, 'managePosts'])->name('dashboard.manage-posts');
    Route::get('/dashboard/add-user', [DashboardController::class, 'addUser'])->name('dashboard.add-user')->middleware('is_admin');
    Route::get('/dashboard/manage-users', [DashboardController::class, 'manageUsers'])->name('dashboard.manage-users');
    Route::get('/dashboard/add-category', [DashboardController::class, 'addCategory'])->name('dashboard.add-category');
    Route::get('/dashboard/manage-categories', [DashboardController::class, 'manageCategories'])->name('dashboard.manage-categories')->middleware('is_admin');
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


// routes/web.php

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');







