<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Auth;

class IsBan
{
    public function handle($request, Closure $next) { //Проверка на бан (Запрос, странца перенаправления)
        if (Auth::user() &&  Auth::user()->ban == 0) { // Если пользователь зарегистрирован и ban = 0
            return $next($request); // Если условие выполняется, то отправляем дальше
        }
        elseif (!Auth::check()) { //Если не зарегистрирован
            return $next($request); // Отправляем дальше
        }
        else{ // Если пользователь заблокирован
            $response = response()->view('auth.login'); // Перенаправляем на страницу авторизации
            $response->withCookie(cookie('name', 'value', 60)); // Задаем данные в куки
            return $response; // Возвращаем запрос
        }
    }
}
