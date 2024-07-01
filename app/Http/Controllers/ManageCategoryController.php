<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ManagecategoryController extends Controller
{

  public function edit($id)
{
    $category = Category::findOrFail($id);
    return view('dashboard.edit-category', compact('category'));
}

public function update(Request $request, $id)
{
    $category = Category::findOrFail($id);

    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
    ]);

    $category->update([
        'title' => $request->title,
        'description' => $request->description,
    ]);

    return redirect()->route('dashboard.manage-categories')->with('success', 'category updated successfully.');
      }

    public function index()
    {
        $categories = Category::all();
        return view('dashboard.manage-categories', compact('categories'));
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return redirect()->route('dashboard.manage-categories')->with('success', 'category deleted successfully.');
    }
}
