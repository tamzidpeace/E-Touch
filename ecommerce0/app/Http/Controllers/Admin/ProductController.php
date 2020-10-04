<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;


class ProductController extends Controller
{
    public function index() {

    }

    public function make(Request $request) {
        $categories = Category::all();
        return view('admin.pages.product.add', compact('categories'));
    }
}
