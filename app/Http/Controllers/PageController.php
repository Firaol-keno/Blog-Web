<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PageController extends Controller
{
    

public function index()
{
    $user = Auth::profile();
    return view('your-view', compact('user'));
}

}
