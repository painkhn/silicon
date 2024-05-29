@extends('layouts.app')

@section('content')
    <div class="max-w-6xl w-full mx-auto my-0 mb-32">
        <div class="user_info flex mb-14">
            <div class="avatar">
                <img src="../img/jiraf.png" alt="">
            </div>
            <!-- инфа о юзере -->
            <div class="info ml-8">
                <div class="font-bold text-2xl mb-5">
                    <p>{{ Auth::user()->name }}</p>
                </div>
                <div class="ml-5 text-xl">
                    <p class="mb-5">{{ Auth::user()->email }}</p>
                    <!-- здесь надо будет передать количество товаров в корзине -->
                    <a href="#!">Товаров в корзине: {{ $summ }}</a>
                </div>
            </div>
        </div>
        <div class="user_edit">
            <div class="title text-xl font-bold text-center mb-10">
                <h2>РЕДАКТИРОВАТЬ АККАУНТ</h2>
            </div>
            <!-- форма для изменения данных юзера -->
            <form method="POST" action="{{ route('EditProfile') }}">
                @csrf
                <ul class="flex justify-between mb-5">
                    <li><input class="max-w-64 w-full border-2 border-black h-16 rounded-2xl px-4 text-xl" type="text"
                            name="name" placeholder="Имя" value="{{ Auth::user()->name }}"></li>
                    <li><input class="max-w-64 w-full border-2 border-black h-16 rounded-2xl px-4 text-xl" type="text"
                            name="surname" placeholder="Фамилия" value="{{ Auth::user()->surname }}"></li>
                    <li><input class="max-w-64 w-full border-2 border-black h-16 rounded-2xl px-4 text-xl" type="email"
                            name="email" placeholder="Электронная почта" value="{{ Auth::user()->email }}"></li>
                    <li><input class="max-w-64 w-full border-2 border-black h-16 rounded-2xl px-4 text-xl" type="password" d
                            name="password" placeholder="Пароль"></li>
                </ul>
                <div class="text-right">
                    <input class="max-w-48 w-full h-14 bg-primary font-bold rounded-2xl" type="submit" value="СОХРАНИТЬ">
                </div>
            </form>
        </div>
    </div>
@endsection
