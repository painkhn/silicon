<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\Product;

class AdminController extends Controller
{
    public function admin_panel() // Открытие админ панели
    {
        $users = User::get(); // Получаем список всех пользователей
        $category = Category::get(); // Получаем список всех категорий
        return view('admin', ['users' => $users, 'categories' => $category]); // Отображаем страницу admin и передаем список пользователей и список категорий
    }

    public function new_position(Request $request) { // Добавление нового товара(HTTP-запрос)
        $validated = $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'about' => 'required|string',
            'amount' => 'required',
            'category_id' => 'required',
            'photo' => 'required|image|mimes:jpg,png,jpeg,webp|max:2048'
        ]); // Проверяем валидацию
    
        $name = time(). "." . $request->photo->extension(); // Определяем имя файла товара (unix время.расширение файла)
        $destination = 'public/products'; // Путь сохранения файла
        $path = $request->photo->storeAs($destination, $name); // Сохранение по пути файла с обозначенным именем
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'about' => $request->about,
            'price' => $request->amount,
            'category_id' => $request->category_id,
            'photo' => 'storage/products/' . $name
        ]; // Собираем полученные данные из формы
        Product::create($data); // Сохраняем данные в бд таблицу Product

        return redirect()->back(); // Возвращаем назад
    }

    public function ban_user($user_id) // Блокировка пользователя(Айди пользователя)
    {
        $user = User::where('id', $user_id)->first(); // Получаем пользователя, которого мы ищем по его айди
        $ban = ($user->ban == 1) ? 0 : 1; // Если бан = 1, то ставим 0, если 0, то ставим 1
        User::where('id', $user_id)->update([
            'ban' => $ban
        ]); // Сохраняем изменения в таблицу user
        return redirect()->back(); // Возвращаем назад
    }
    public function delete_product($product_id) // Удаление товара(Айди товара)
    {
        Product::where('id', $product_id)->delete(); // Находим товар по его айди и удаляем его
        return redirect()->route('index'); // Перенаправляем на главную страницу
    }
}
