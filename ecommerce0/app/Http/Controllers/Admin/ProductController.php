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
        $products = Product::all();
        $product_id = DB::table('product_images')->distinct()->get(['product_id']);
        for ($i=0; $i < count($product_id); $i++) {
            $image_name[$i] = ProductImage::select('name')->where('product_id', $product_id[$i]->product_id)->first();
        }
        if (isset($image_name)) {
            return view('admin.pages.product.index', compact('products', 'image_name'));
        } else {
            return view('admin.pages.product.index', compact('products'));
        }
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

    public function destroy(Request $request)
    {
        $products = Product::all();
        $product = Product::find($request->pID);
        $product_images = ProductImage::where('product_id', $product->id)->get();
        foreach ($product_images as $item) {
            $item->delete();
            unlink('images/product/'. $item->name);
        }
        unlink('files/product/'. $product->file);
        $product->delete();
        return back()->with('products', $products);
    }
}
