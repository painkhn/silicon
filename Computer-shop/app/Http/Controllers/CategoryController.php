<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function open_category($category_link) // Открытие страницы категории (Ссылка на категорию)
    {
        $category = Category::where('link', $category_link)->first(); // Получаем текущую категорию
        $product = Product::where('category_id', $category->id)->get(); // Получаем продукты с соответствующей категорией
        return view('category', ['category' => $category, 'products' => $product]); // Отоброжаем страницу category и передаем информацию о категории и продуктах
    }
}
