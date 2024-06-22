<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle($request, Closure $next) // Проверка на админа (Запрос, странца перенаправления)
    {
        if (Auth::user() and  Auth::user()->is_admin == true) { // Проверяем, зарегистрирован ли пользователь и является ли он админом 
            return $next($request); // Если условия выполянется, то переводим на следующую страницу
        }
        return redirect()->back(); // Если нет, то возвращаем назад
    }
}
