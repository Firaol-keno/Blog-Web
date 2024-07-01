<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ManageUsersController extends Controller
{

  public function edit($id)
{
    $user = Profile::findOrFail($id);
    return view('dashboard.edit-user', compact('user'));
}

public function update(Request $request, $id)
{
    $user = Profile::findOrFail($id);

    $request->validate([
        'firstname' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'is_admin' => 'required|boolean',
    ]);

    $user->update([
        'firstname' => $request->firstname,
        'lastname' => $request->lastname,
        'is_admin' => $request->is_admin,
    ]);

    return redirect()->route('dashboard.manage-users')->with('success', 'User updated successfully.');
      }

    public function index()
    {
        $users = Profile::all();
        return view('dashboard.manage-users', compact('users'));
    }

    public function destroy($id)
    {
        $user = Profile::findOrFail($id);
        $user->delete();

        return redirect()->route('dashboard.manage-users')->with('success', 'User deleted successfully.');
    }
}
