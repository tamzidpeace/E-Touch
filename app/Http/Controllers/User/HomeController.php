<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\ProductImage;
use DB;

class HomeController extends Controller
{
    public function index() {
        $categories = Category::all();
        $products = DB::table('products')->limit(12)->get();
        $product_ids = DB::table('product_images')->limit(12)->distinct()->get(['product_id']);
        for ($i=0; $i < count($product_ids); $i++) {
            $image_names[$i] = ProductImage::select('name')->where('product_id', $product_ids[$i]->product_id)->first();
        }
        
        return view('user.pages.index', \compact('categories', 'products', 'image_names'));
    }
}
