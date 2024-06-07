@extends('layouts.app')

@section('content')
    <div class="max-w-6xl w-full mx-auto my-0 h-auto">
        <div class="product_info flex justify-between">
            <div class="flex">
                <div class="product-image">
                    <img class="max-w-96" src="{{ asset($product->photo) }}" alt="">
                </div>
                <div class="max-w-60 w-full ml-8 relative">
                    <div class="h-product mb-5">
                        <div class="font-bold text-lg mb-8">
                            <p>{{ $product->name }}</p>
                        </div>
                        <div class="desc text-lg mb-3">
                            <p>Описание:</p>
                        </div>
                        <div class="desc-text">
                            {{ $product->description }}
                        </div>
                    </div>
                    @if ($basket)
                        <a href="{{ route('AddBasket', ['tovar_id' => $product->id]) }}">
                            <input class=" max-w-48 w-min h-12 bg-primary font-bold rounded-2xl px-4" type="button"
                                value="Удалить из корзины">
                        </a>
                    @else
                        <a href="{{ route('AddBasket', ['tovar_id' => $product->id]) }}">
                            <input class=" max-w-48 w-min h-12 bg-primary font-bold rounded-2xl px-4" type="button"
                                value="В КОРЗИНУ">
                        </a>
                    @endif
                    <!-- КНОПКА УДАЛИТЬ -->
                    @if (Auth::user()->is_admin == 1)
                        <a href="{{ route('DeletePosition', ['product_id' => $product->id]) }}">
                            <input class=" max-w-48 w-min h-12 bg-primary font-bold rounded-2xl px-4 mt-5" type="button"
                                value="Удалить товар">
                        </a>
                    @endif
                </div>
            </div>
            <div class="about max-w-96">
                <div class="text-lg mb-5">
                    <p>Коротко о товаре:</p>
                </div>
                <div class="about-text">
                    <p>
                        {{ $product->about }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
