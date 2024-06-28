<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Profile;

class SignupController extends Controller
{
    public function index()
    {
        return view('signup');
    }

    public function register(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:profile',
            'email' => 'required|string|email|max:255|unique:profile',
            'password' => 'required|string|min:8|confirmed',
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $avatarName = time().'.'.$request->avatar->extension();  
        $request->avatar->move(public_path('avatars'), $avatarName);

        Profile::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'avatar' => $avatarName,
            'is_admin' => 0, // Set is_admin to 0
        ]);

        return redirect('/signin')->with('success', 'Account created successfully!');
    }
}
