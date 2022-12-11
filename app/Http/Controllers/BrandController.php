<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function addBrand() {
        $categories = Category::latest()->get();
        return view('backend.brand.create', compact('categories'));
    }
    public function storeBrand(Request $request) {
        $request->validate([
            'brand_name' => 'required | unique:brands',
            'category_id' => 'required',
        ]);
        $category_id = $request->category_id;
        $category_name = Category::where('id', $category_id)->value('category_name');
        $brand = new Brand();
        $brand->brand_name = $request->brand_name;
        $brand->slug = strtolower(str_replace(' ', '-', $brand->brand_name));
        $brand->category_id = $category_id;
        $brand->category_name = $category_name;
        $brand->save();
        Category::where('id', $category_id)->increment('brand_count', 1);
        return redirect()->route('index')->with('message', 'Brand Category Added Successfully!');
    }

    public function manageBrand() {
        $brands = Brand::latest()->get();
        return view('backend.brand.manage', compact('brands'));
    }
}
