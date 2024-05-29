@extends('layouts.app')

@section('content')
    <div class="panel p-20">
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
                </div>
            </div>
        </div>
        <div class="panel-content flex justify-between max-w-4xl">
            <div class="users">
                <div class="title font-bold text-2xl mb-8">
                    <p>Пользователи</p>
                </div>
                <ul class="grid grid-cols-1">
                    @foreach ($users as $user)
                        <li class="mb-10">
                            <div class="flex mb-5">
                                <div class="avatar max-w-32">
                                    <img class="w-full" src="../img/jiraf.png" alt="">
                                </div>
                                <!-- инфа о юзере -->
                                <div class="info ml-8">
                                    <div class="font-bold text-xl">
                                        <p>{{ $user->name }}</p>
                                    </div>
                                    <div class="text-lg">
                                        <p>{{ $user->email }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="btn">
                                <input class="max-w-32 w-full h-12 border border-black text-black font-bold text-lg"
                                    type="submit" value="Бан">
                                <input class="max-w-32 w-full h-12 border border-black text-black font-bold text-lg"
                                    type="submit" value="Разбан">
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="product">
                <div class="title font-bold text-2xl mb-8">
                    <p>Продукт</p>
                </div>
                <form action="{{ route('NewPosition') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="add text-base">
                        <div class="input mb-5">
                            <input class="max-w-48 w-full h-12 px-3 border-2 rounded border-black" type="text"
                                name="name" placeholder="Название">
                        </div>
                        <div class="input mb-5">
                            <textarea class="max-w-48 w-full px-3 border-2 rounded border-black h-40" name="description" id="description"
                                placeholder="Описание"></textarea>
                        </div>
                        <div class="input mb-5">
                            <textarea class="max-w-48 w-full px-3 border-2 rounded border-black h-40" name="about" id="about"
                                placeholder="О товаре"></textarea>
                        </div>
                        <div class="input mb-5">
                            <input class="max-w-48 w-full h-12 px-3 border-2 rounded border-black" type="text"
                                name="amount" placeholder="Стоимость">
                        </div>
                        <div class="input mb-5">
                            <select id="category_id" name="category_id"
                                class="max-w-48 w-full h-12 px-3 border-2 rounded border-black">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input mb-5">
                            <input class="max-w-48 w-full h-12 px-3 border-2 rounded border-black custom-file-input"
                                type="file" name="photo" title="">
                        </div>
                        <input class="max-w-32 w-full h-12 border border-black text-black font-bold text-lg" type="submit"
                            value="Добавить">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
