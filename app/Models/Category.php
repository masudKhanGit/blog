<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    
    private static $category;

    public static function createCategory($request) {
        self::$category = new Category();
        $request->validate([
            'name' => 'max:40 | min:3 '
        ]);
        self::$category->category_name = $request->category_name;
        self::$category->slug = strtolower(str_replace(' ', '-', self::$category->category_name));
        self::$category->save();
    }

    public static function updateCategory($request, $id) {
        self::$category = Category::find($id);
        $request->validate([
            'name' => 'max:40 | min:3 '
        ]);
        self::$category->category_name = $request->category_name;
        self::$category->save();
    }
}
