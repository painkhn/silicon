@extends('layouts.app')

@section('content')
    <div class="max-w-6xl w-full mx-auto my-0 mb-32">
        <div class="user_info flex mb-14">
            <div class="avatar">
                @if (Auth::user()->photo)
                    <img class="max-w-64 h-64" src="{{ asset(Auth::user()->photo) }}" alt="">
                @else
                    <img class="max-w-64 h-64 src="{{ asset('img/jiraf.png') }}" alt="">
                @endif
            </div>
            <!-- инфа о юзере -->
            <div class="info ml-8">
                <div class="font-bold text-2xl mb-5">
                    <p>{{ Auth::user()->name }}</p>
                </div>
                <div class="ml-5 text-xl mb-5">
                    <p class="mb-5">{{ Auth::user()->email }}</p>
                    <!-- здесь надо будет передать количество товаров в корзине -->
                    <a href="#!">Товаров в корзине: {{ $summ }}</a>
                </div>
                <form id="avatar-file-form" method="POST" enctype="multipart/form-data" action="{{ route('NewAvatar') }}"
                    class="flex flex-col">
                    @csrf
                    @method('PUT')
                    <label class="ml-5 mb-2 text-center" for="avatar_change">Сменить аватарку</label>
                    <input type="file" name="avatar_change" id="avatar_change"
                        class="max-w-48 w-full h-12 px-3 border-2 rounded border-black custom-file-input ml-5">
                </form>
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
    <script>
        document.getElementById('avatar_change').addEventListener('change', function() {
            document.getElementById('avatar-file-form').submit();
        });
    </script>
@endsection
