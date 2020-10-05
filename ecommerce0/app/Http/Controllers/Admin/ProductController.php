<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\ProductImage;
use DB;

class ProductController extends Controller
{
    public function index()
    {
    }

    public function make()
    {
        $categories = Category::all();
        return view('admin.pages.product.add', compact('categories'));
    }

    public function makeConfirm(Request $request)
    {
        $product = new Product();
       

        $product->name = $request->name;
        $product->category_id = $request->category;
        $product->description = $request->description;
        
        $file = $request->file('file');
        $file_name = time() . '_' . $file->getClientOriginalName();
        $file->move('files/product', $file_name);

        $product->file = $file_name;
        $product->save();

        $last_product = DB::table('products')->latest()->first();
        $id = $last_product->id;
                
        if ($request->hasfile('p_images')) {
            foreach ($request->file('p_images') as $file) {
                $product_image = new ProductImage();
                $name = time() . '_'  . $file->getClientOriginalName();
                $product_image->name = $name;
                $product_image->product_id = $id;
                $file->move(public_path().'/images/product', $name);                
                $product_image->save();
            }
        }
                            
        return back();
    }
}
