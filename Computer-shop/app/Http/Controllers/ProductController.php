<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function open_product($product_id)
    {
        $product = Product::where('id', $product_id)->first();
        return view('product', ['product' => $product]);
    }
}
