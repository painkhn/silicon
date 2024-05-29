<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Basket;
use App\Models\Product;
use Auth;

class BasketController extends Controller
{
    public function basket_open()
    {
        $baskets = Basket::where('user_id', Auth::user()->id)->get();
        $productIds = $baskets->pluck('product_id');
        $products = Product::whereIn('id', $productIds)->get();
        $summ = 0; 
        foreach ($products as $product) {
            $summ += $product->price;
        };
        return view('basket', ['baskets' => $baskets, 'products'=>$products, 'summ' => $summ]);
    }

    public function add_basket($tovar_id)
    {
        $status = Basket::where('user_id', Auth::user()->id)->where('product_id', $tovar_id)->first();
        if ($status) {
            Basket::where('id', $status->id)->delete();
        }
        else {
            $data = [
                'user_id' => Auth::user()->id,
                'product_id' => $tovar_id,
            ];
            Basket::create($data);
        }
        return redirect()->back();
    }
}
