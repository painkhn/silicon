<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Basket;
use App\Models\Product;
use Auth;

class BasketController extends Controller
{
    public function basket_open() // Открытие корзины
    {
        $baskets = Basket::where('user_id', Auth::user()->id)->get(); // Получаем данные из корзины, где user_id = айди пользователя
        $productIds = $baskets->pluck('product_id'); //Получем айди товара, который находится в корзины
        $products = Product::whereIn('id', $productIds)->get(); // Получаем товав по его айди, которые находятся в корзине
        $summ = 0; // Ставим изначальную сумму всех товаров 
        foreach ($products as $product) { 
            $summ += $product->price;
        }; // Перебираем все продукты, которые находятся в корзине и прибаляем их стоимость к заданной сумме
        return view('basket', ['baskets' => $baskets, 'products'=>$products, 'summ' => $summ]); // Отображаем страницу basket и передаем туда информацию о корзине, продуктах и общая сумма
    }

    public function add_basket($tovar_id) // Добавление товара в корзину (Айди товара)
    {
        $status = Basket::where('user_id', Auth::user()->id)->where('product_id', $tovar_id)->first(); // Смотрим, есть ли товар уже в бд
        if ($status) { // Если товар есть в бд 
            Basket::where('id', $status->id)->delete(); // Удаляем его из корзины
        }
        else { // Если товара нет в бд 
            $data = [
                'user_id' => Auth::user()->id,
                'product_id' => $tovar_id,
            ]; // Определяем данные для занесения в бд
            Basket::create($data); // Добавляем данные в бд
        }
        return redirect()->back(); // Возвращаем на страницу назад
    }
}
