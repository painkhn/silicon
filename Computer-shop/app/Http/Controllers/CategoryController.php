<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function open_category($category_link)
    {
        $category = Category::where('link', $category_link)->first();
        $product = Product::where('category_id', $category->id)->get();
        return view('category', ['category' => $category, 'products' => $product]);
    }
}
