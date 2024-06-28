<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Profile;

class SigninController extends Controller
{
    public function index()
    {
        return view('signin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username_or_email' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = Profile::where('username', $request->username_or_email)
                       ->orWhere('email', $request->username_or_email)
                       ->first();

        if ($user && Hash::check($request->password, $user->password)) {
            Auth::login($user);
            return redirect('/dashboard')->with('success', 'Logged in successfully!');
        } else {
            return redirect()->back()->with('error', 'Invalid credentials. Please try again.');
        }
    }
}
