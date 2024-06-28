<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SigninController;
use App\Http\Controllers\SignupController;
use App\Http\Controllers\DashboardController;


//Route::get('/', function () {
   //return view('welcome')
//});


Route::get('/', [HomeController::class, 'index']);

Route::get('/signin', [SigninController::class, 'index'])->name('signin');
Route::post('/signin', [SigninController::class, 'login']);


Route::get('/signup', [SignupController::class, 'index']);
Route::post('/signup', [SignupController::class, 'register'])->name('signup');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    });
});



Route::get('/blog', function () {
    return view('blog');
})->name('blog');


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::get('/dashboard/add-post', [DashboardController::class, 'addPost'])->middleware('auth');
Route::get('/dashboard/manage-posts', [DashboardController::class, 'managePosts'])->middleware('auth');
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard/add-user', [DashboardController::class, 'addUser']);
    Route::get('/dashboard/manage-users', [DashboardController::class, 'manageUsers']);
    Route::get('/dashboard/add-category', [DashboardController::class, 'addCategory']);
    Route::get('/dashboard/manage-categories', [DashboardController::class, 'manageCategories']);
});


