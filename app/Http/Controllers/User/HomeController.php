<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use App\Models\Admin\ProductImage;
use App\Models\Admin\Contact;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = DB::table('products')->limit(12)->get();
        $product_ids = DB::table('product_images')->limit(12)->distinct()->get(['product_id']);
        for ($i=0; $i < count($product_ids); $i++) {
            $image_names[$i] = ProductImage::select('name')->where('product_id', $product_ids[$i]->product_id)->first();
        }
        
        return view('user.pages.index', \compact('categories', 'products', 'image_names'));
    }

    public function productDetails(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $product_images = ProductImage::where('product_id', $product->id)->get();
        $product_image_first = ProductImage::where('product_id', $product->id)->first();
        $all = Product::where('category_id', $product->category_id)->limit(4)->get();
        $similar_products = $all->except($request->id);
        $similar_product_ids = $similar_products->pluck('id');
        
        $res = count($similar_product_ids);

        if ($res > 0) {
            for ($i=0; $i < 4; $i++) {
                $similar_product = Product::findOrFail($similar_product_ids[$i]);
                $similar_product_images[$i] = ProductImage::where('product_id', $similar_product->id)->first();
                if ($i == count($similar_product_ids)-1) {
                    break;
                }
            }
            return view(
                'user.pages.product_details',
                \compact('product', 'product_images', 'product_image_first', 'similar_products', 'similar_product_images')
            );
        } else {
            return view(
                'user.pages.product_details',
                \compact('product', 'product_images', 'product_image_first', 'similar_products')
            );
        }
    }

    public function ajaxProductImages(Request $request)
    {
        $server = $_SERVER['SERVER_NAME'];
        $image =  ProductImage::findOrFail($request->id);
        $data = ['server' => $server, 'image' => $image];
        return \response(json_encode($data));
    }

    public function about()
    {
        return view('user.pages.about');
    }

    public function contact()
    {
        return view('user.pages.contact');
    }

    public function contactMessage(Request $request)
    {
        try {
            $message = new Contact;
            $message->name = $request->Name;
            $message->email = $request->Email;
            $message->message = $request->Message;
            $message->save();
            //Alert::alert('Title', 'Message', 'Type');
            return back();
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function category(Request $request)
    {                
        $categories = Category::all();
        $products = Product::where('category_id', $request->id)->paginate(12);        
        return view('user.pages.category')->with('products', $products)->with('categories', $categories);
    }

    public function search(Request $request) {

        $categories = Category::all();
        $products = Product::where('name', 'like', '%' . $request->search . '%')->paginate(12);        
        return view('user.pages.category')->with('products', $products)->with('categories', $categories);
    }
}
