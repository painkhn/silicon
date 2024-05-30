@extends('layouts.app')

@section('content')
    <div class="search-main">
        <div class="max-w-6xl w-full mx-auto my-0 mb-20">
            <div class="user_info flex mb-14">
                <div class="avatar max-w-44">
                    @if (Auth::user()->photo)
                        <img class="max-w-44" src="{{ asset(Auth::user()->photo) }}" alt="">
                    @else
                        <img class="max-w-44 src="{{ asset('img/jiraf.png') }}" alt="">
                    @endif
                </div>
                <!-- инфа о юзере -->
                <div class="info ml-5">
                    <div class="font-bold text-xl mb-2">
                        <p>{{ Auth::user()->name }}</p>
                    </div>
                    <div class="text-lg">
                        <p class="mb-5">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>
            <ul class="grid grid-cols-5">
                @foreach ($products as $product)
                    <a href="{{ route('OpenProduct', ['product_id' => $product->id]) }}">
                        <li>
                            <div class="goods-block relative mb-8">
                                <div class="max-w-32 w-full my-0 mx-auto ">
                                    <img src="{{ $product->photo }}" alt="" class="w-full mb-3">
                                    <div class="text-center text-xs font-bold">
                                        <p>{{ $product->name }}</p>
                                    </div>
                                    <div class="absolute bottom-5 absolute-center font-bold">
                                        <p>{{ $product->price }} ₽</p>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </a>
                @endforeach
            </ul>
            <p class="font-bold text-2xl mb-10">Итого: <span>{{ $summ }}</span></p>
            <input class="max-w-48 w-full h-12 bg-primary font-bold rounded-2xl" type="button" value="КУПИТЬ">
        </div>
    </div>
@endsection
