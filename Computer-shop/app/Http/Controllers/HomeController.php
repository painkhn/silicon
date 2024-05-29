<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        $positions = Product::orderBy('created_at', 'DESC')->get();
        return view('welcome', ['categories' => $categories, 'positions' => $positions]);    
    }
}
