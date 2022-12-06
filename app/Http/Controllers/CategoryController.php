<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller {
    public function create() {
        return view('backend.category.create');
    }
    public function categoryStore(Request $request) {
        $category = new Category();
        $request->validate([
            'name' => 'max:40 | min:3 '
        ]);
        $category->category_name = $request->category_name;
        $category->save();
        return redirect()->back()->with('message', 'Category Add Successfully');
    }
    public function manageCategory() {
        $categoryes = Category::latest()->get();
        return view('backend.category.manage', compact('categoryes'));
    }
    public function editManageCategory($id) {
        Category::findOrFail($id)->update([
            'category_name' => 'a',
        ]);
    }
}