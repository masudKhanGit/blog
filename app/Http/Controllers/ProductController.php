<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller {
    public function allProduct() {
        $categories = Category::all();
        $products = Product::all();
        $page = 'All Product';
        return view('frontend.products.all-product', compact('categories', 'products', 'page'));
    }
    public function create() {
        $categories = Category::all();
        $brands = Brand::all();
        $products = Product::all();
        return view('backend.product.create', compact('categories', 'brands', 'products'));
    }
    public function store(Request $request) {
        $request->validate([
            'category_id' => 'required',
            'brand_id'    => 'required',
            'price'       => 'required | min:1',
            'image'       => 'required | image:jpg,png,webp'
        ]);
        $product               = new Product();
        $product->category_id  = $request->category_id;
        $product->brand_id     = $request->brand_id;
        $product->product_name = $request->product_name;
        $product->price        = $request->price;
        $product->description  = $request->description;
        $image                 = $request->image;
        if($image) {
            $folder         = 'db-images/product-images/';
            $imageName      = 'product_image' . time() . '.' . $image->getClientOriginalExtension();
            $image->move($folder, $imageName);
            $product->image = $folder . $imageName;
        } else { 
            $product->image = 'demo.jpg';
        }
        $product->save();
        return redirect()->back()->with('message', 'product added successfully');
    }

    public function categoryProduct($cat_id) {
        $categories = Category::all();
        $products = Product::where('category_id', "=", $cat_id)->get();
        $page = Category::find($cat_id)->category_name . ' '. 'Products';
        return view('frontend.products.all-product', compact('categories', 'products', 'page'));
    }
}
