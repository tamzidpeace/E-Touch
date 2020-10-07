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
        $categories = Category::all();
        $product_id = DB::table('product_images')->distinct()->get(['product_id']);
        for ($i=0; $i < count($product_id); $i++) {
            $image_name[$i] = ProductImage::select('name')->where('product_id', $product_id[$i]->product_id)->first();
        }
        if (isset($image_name)) {
            return view('admin.pages.product.index', compact('products', 'image_name', 'categories'));
        } else {
            return view('admin.pages.product.index', compact('products', 'categories'));
        }
    }

    public function make()
    {
        $categories = Category::all();
        return view('admin.pages.product.add', compact('categories'));
    }

    public function makeAjax(Request $request)
    {
        $product = Product::findOrFail($request->id);
        return \response()->json($product);
    }

    public function makeConfirm(Request $request)
    {
        
        if ($request->update == 1) {
            $product = Product::findOrFail($request->product_id);
            $product_pre_images_id = ProductImage::where('product_id', $request->product_id)->pluck('id');
            $product_pre_images = ProductImage::where('product_id', $request->product_id)->get();

            if ($request->hasfile('p_images')) {
                ProductImage::destroy($product_pre_images_id);
                foreach ($product_pre_images as $item) {
                    unlink('public/images/product/'. $item->name);
                }
            }
            if ($request->hasfile('file')) {
                unlink('public/files/product/'. $product->file);
            }
        } else {
            $product = new Product();
        }
        
        $product->name = $request->name;
        $product->category_id = $request->category;
        $product->description = strip_tags($request->description);
        
        if ($request->hasfile('file')) {            
            $file = $request->file('file');
            $file_name = time() . '_' . $file->getClientOriginalName();
            $file->move('public/files/product', $file_name);
            $product->file = $file_name;
        }
        
        $product->save();

        if ($request->update == 1) {
            $id = $request->product_id;
        } else {
            $last_product = DB::table('products')->latest()->first();
            $id = $last_product->id;
        }
                
        if ($request->hasfile('p_images')) {
            foreach ($request->file('p_images') as $file) {
                $product_image = new ProductImage();
                $name = time() . '_'  . $file->getClientOriginalName();
                $product_image->name = $name;
                $product_image->product_id = $id;
                $file->move('public/images/product', $name);
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
            unlink('public/images/product/'. $item->name);
        }
        unlink('public/files/product/'. $product->file);
        $product->delete();
        return back()->with('products', $products);
    }

    public function view(Request $request)
    {
        $product = Product::find($request->id);
        $product_images = ProductImage::where('product_id', $product->id)->get();
        $product_image_first = ProductImage::where('product_id', $product->id)->first();
        $data = ['images' => $product_images, 'first_image' => $product_image_first, 'product' => $product];
        
        return view('admin.pages.product.view', compact('product', 'product_images', 'product_image_first'));
    }
}
