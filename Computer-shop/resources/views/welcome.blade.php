@extends('layouts.app')

@section('content')
    <!-- категории -->
    <div class="main-top flex justify-between mb-10">
        <div class="category max-w-64 w-full h-auto p-5 border-black rounded border min-h-510px mr-10">
            <div class="title font-bold mb-10">
                <h2>КАТЕГОРИИ</h2>
            </div>
            <!-- список категорий -->
            <ul>
                @foreach ($categories as $category)
                    <li class="border-b pb-5 pl-5 mb-8">
                        <a href="{{ $category->link }}">{{ $category->name }}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div
            class="main-info-block w-full rounded min-h-510px bg-black main-bg bg-no-repeat text-white text-3xl relative font-bold">
            <h1 class="absolute bottom-10 left-10 text-border">Инновации начинаются здесь.</h1>
        </div>
    </div>
    <div class="img-list">
        <div class="title font-bold text-lg mb-10">
            <h2>ПРИМЕРЫ ПК</h2>
        </div>
        <ul class="flex flex-wrap justify-between">
            <li><img src="{{ asset('img/img1.png') }}" alt=""></li>
            <li><img src="{{ asset('img/img2.png') }}" alt=""></li>
            <li><img src="{{ asset('img/img3.png') }}" alt=""></li>
            <li><img src="{{ asset('img/img4.png') }}" alt=""></li>
            <li><img src="{{ asset('img/img5.png') }}" alt=""></li>
            <li><img src="{{ asset('img/img6.png') }}" alt=""></li>
            <li><img src="{{ asset('img/img7.png') }}" alt=""></li>
            <li><img src="{{ asset('img/img8.png') }}" alt=""></li>
        </ul>
    </div>
    <div class="goods">
        <div class="title font-bold text-lg mb-10">
            <h2>ТОВАРЫ</h2>
        </div>
        <div class="goods-list flex justify-between flex-wrap">
            <div class="goods-block relative">
                <div class="max-w-32 w-full my-0 mx-auto ">
                    <img src="src/img/good1.png" alt="" class="w-full mb-3">
                    <div class="text-center text-xs font-bold">
                        <p>ПК ARDOR GAMING EVO X066</p>
                    </div>
                    <div class="absolute bottom-5 absolute-center font-bold">
                        <p>274 999 ₽</p>
                    </div>
                </div>
            </div>
            <div class="goods-block relative">
                <div class="max-w-32 w-full my-0 mx-auto ">
                    <img src="src/img/good2.png" alt="" class="w-full mb-3">
                    <div class="text-center text-xs font-bold">
                        <p>ПК iRU Game 515EC MT</p>
                    </div>
                    <div class="absolute bottom-5 absolute-center font-bold">
                        <p>91 799 ₽</p>
                    </div>
                </div>
            </div>
            <div class="goods-block relative">
                <div class="max-w-32 w-full my-0 mx-auto ">
                    <img src="src/img/good3.png" alt="" class="w-full mb-3">
                    <div class="text-center text-xs font-bold">
                        <p>ПК Raskat Strike 520</p>
                    </div>
                    <div class="absolute bottom-5 absolute-center font-bold">
                        <p>146 499 ₽</p>
                    </div>
                </div>
            </div>
            <div class="goods-block relative">
                <div class="max-w-32 w-full my-0 mx-auto ">
                    <img src="src/img/good4.png" alt="" class="w-full mb-3">
                    <div class="text-center text-xs font-bold">
                        <p>ПК HP OMEN GT22-0005ur</p>
                    </div>
                    <div class="absolute bottom-5 absolute-center font-bold">
                        <p>541 999 ₽</p>
                    </div>
                </div>
            </div>
            <div class="goods-block relative">
                <div class="max-w-32 w-full my-0 mx-auto ">
                    <img src="src/img/good5.png" alt="" class="w-full mb-3">
                    <div class="text-center text-xs font-bold">
                        <p>ПК Acer Predator PO7-650</p>
                    </div>
                    <div class="absolute bottom-5 absolute-center font-bold">
                        <p>409 999 ₽</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
