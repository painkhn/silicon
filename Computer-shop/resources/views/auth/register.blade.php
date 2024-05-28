@extends('layouts.pages')

@section('content')
    <form method="POST" action="{{ route('register') }}" class="w-full">
        @csrf
        <div class="label mb-3">
            <label for="name">Имя:</label>
        </div>
        <div class="input mb-8">
            <input type="text" name="name" id="name" class="border border-black rounded-3xl w-full px-3 h-9">
        </div>
        <div class="label mb-3">
            <label for="surname">Фамилия:</label>
        </div>
        <div class="input mb-8">
            <input type="text" name="surname" id="surname" class="border border-black rounded-3xl w-full px-3 h-9">
        </div>
        <div class="label mb-3">
            <label for="email">Электронная почта:</label>
        </div>
        <div class="input mb-8">
            <input type="email" name="email" id="email" class="border border-black rounded-3xl w-full px-3 h-9">
        </div>
        <div class="label mb-3">
            <label for="password">Пароль:</label>
        </div>
        <div class="input mb-10">
            <input type="password" name="password" id="password" class="border border-black rounded-3xl w-full px-3 h-9">
        </div>
        <div class="submit text-center">
            <input type="submit" value="Регистрация"
                class="max-w-half bg-primary color-black text-lg h-12 rounded-3xl font-bold mb-5">
        </div>
        <div class="text-center mb-5">
            <a href="{{ route('login') }}">Уже есть аккаунт</a>
        </div>
        <div class="text-center">
            <a href="{{ route('login') }}">На главную</a>
        </div>
    </form>
@endsection
