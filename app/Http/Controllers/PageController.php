<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PageController extends Controller
{
    

public function index()
{
    $user = Auth::user();
    return view('/', compact('user'));
}

public function logout()
{
    Auth::logout();
    return redirect('/');
}

}
