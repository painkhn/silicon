@extends('layouts.pages')

@section('content')
    <form method="POST" action="{{ route('login') }}" class="w-full">
        @csrf
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
            <a type="submit"><input type="submit" value="Войти"
                    class="max-w-half bg-primary color-black text-lg h-12 rounded-3xl font-bold mb-5"></a>
        </div>
        <div class="text-center mb-5">
            <a href="{{ route('register') }}">Создать аккаунт</a>
        </div>
        <div class="text-center">
            <a href="{{ route('index') }}">На главную</a>
        </div>
    </form>
@endsection
