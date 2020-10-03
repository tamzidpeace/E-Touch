<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Alert;
use SweetAlert;
use App\Models\Admin\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.pages.category.index', compact('categories'));
    }

    public function make(Request $request)
    {              
        try {            
            if ($request->mId == 0) {
                $category = new Category();
                $validatedData = $request->validate([
                    'name' => 'required|unique:categories|max:255',
                ]);
            } else {
                $category = Category::findOrFail($request->mId);
            }
            $category->name = $request->name;
            $category->description = $request->description;            
            $category->save();
            $error = 123;
            return back()->with('error', $error);
        } catch (Exception $e) {
            return $e;
        }
    }

    public function update(Request $request)
    {
        $category = Category::findOrFail($request->id);
        return $category;
    }
}
