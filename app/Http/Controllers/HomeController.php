<?php

namespace App\Http\Controllers;

use App\Models\Category;

class HomeController extends Controller
{
    public function index () {
        $categories = Category::latest()->get();
        return view('frontend.home.index', compact('categories'));
    }
}
