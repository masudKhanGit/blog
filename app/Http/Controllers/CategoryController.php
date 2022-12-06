<?php

namespace App\Http\Controllers;

use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller {

    public function create() {
        return view('backend.category.create');
    }

    public function categoryStore(Request $request) {
        Category::createCategory($request);
        return redirect()->route('manage.category')->with('message', 'Category Add Successfully');
    }

    public function manageCategory() {
        $categoryes = Category::latest()->get();
        return view('backend.category.manage', compact('categoryes'));
    }

    public function editCategory($id) {
        $category = Category::find($id);
        return view('backend.category.editCategory', compact('category'));
    }

    public function updateCategory(Request $request, $id) {
        Category::updateCategory($request, $id);
        return redirect()->route('manage.category')->with('message', 'Category Update Successfully');
    }
    
    public function deleteCategory($id) {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('manage.category')->with('message', 'Category Delete Successfully');

    }   
}