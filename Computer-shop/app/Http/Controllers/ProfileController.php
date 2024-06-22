<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\User;
use App\Models\Basket;

class ProfileController extends Controller
{
    public function edit_user(Request $request) { // Сохранение настроек пользователя (HTTP-запрос)
        User::where('id', Auth::user()->id)->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]); // Обновление таблицы user на значение, которые получили с формы

        return redirect()->back(); // Возвращаем назад
    }
    public function profile() // Открытие профиля
    {
        $basket = Basket::where('user_id', Auth::user()->id)->get(); //Получаем информацию из корзины
        return view('profile', ['summ' => count($basket)]); // Отображаем страницу profile и передаем колличество товара
    }
    public function avatar(Request $request) // Изменение аватара(HTTP-запрос)
    {
        $validated = $request->validate([
            'avatar_change' => 'required|image|mimes:jpg,png,jpeg|max:2048'
        ]); // Валидация фото профиля
        
        $user = User::where('id', Auth::user()->id)->first(); // Получаем информацию о пользователе
        $photoPath = $user->photo; // Получаем путь и имя фото профиля
        if (file_exists($photoPath)) {
            unlink($photoPath);
        } // Если фото есть, то удаляем его из хранилища

        $name = time(). ".". $request->file('avatar_change')->extension(); // Переименовываем файл на unix время и расширение 
        $destination = 'public/avatars'; // Путь для сохранения файла
        $path = $request->file('avatar_change')->storeAs($destination, $name); // Сохраняем файл 
        User::where('id', Auth::user()->id)->update([
            'photo' => 'storage/avatars/' . $name
        ]); // Обновляем информацию о фото профиля
    
        return redirect()->back(); //Возвращаем назад
    }
}
