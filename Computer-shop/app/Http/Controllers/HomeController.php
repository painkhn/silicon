<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class HomeController extends Controller
{
    public function index() // Открытие главной страницы
    {
        $categories = Category::get(); // Получаем список всех категорий
        $positions = Product::orderBy('created_at', 'DESC')->get(); // получаем последние добавленные товары 
        return view('welcome', ['categories' => $categories, 'positions' => $positions]); // Отображаем странциу welcome и передаем категории и список товаров
    }
    
    public function search(Request $request) // Поиск товара (HTTP-запрос)
    {
        $word = $request->word; // Получаем введенное слово
        $results = Product::where('name', 'like', "%{$word}%")->orWhere('description', 'like', "%{$word}%")->orderBy('id')->get(); // ищем в бд продуктов, где имя или описание содержит наше слово 
        return view('search', ['results' => $results]); // Отображаем страницу search и передаем результат поиска
    }
}
