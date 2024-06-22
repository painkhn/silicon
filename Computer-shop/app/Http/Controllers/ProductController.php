<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Basket;
use App\Models\User;
use Auth;

class ProductController extends Controller
{
    public function open_product($product_id) // Открытие страницы товара (Айди товара)
    {
        $basket = Basket::where('user_id', Auth::user()->id)->where('product_id', $product_id)->first(); //Получаем значение, находится ли этот товар в корзине
        $product = Product::where('id', $product_id)->first(); // Получаем информацию о продукте по его айди
        return view('product', ['product' => $product, 'basket' => $basket]); // Отображаем страницу product и передаем информацию о товаре и значение корзины
    }
}
