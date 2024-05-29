<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Basket;
use Auth;

class ProductController extends Controller
{
    public function open_product($product_id)
    {
        $basket = Basket::where('user_id', Auth::user()->id)->where('product_id', $product_id)->first();;
        $product = Product::where('id', $product_id)->first();
        return view('product', ['product' => $product, 'basket' => $basket]);
    }
}
