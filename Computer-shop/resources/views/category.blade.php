@extends('layouts.app')

@section('content')
    <div class="search-main">
        <div class="max-w-6xl w-full h-auto mx-auto my-0">
            <div class="title font-bold text-2xl mb-10">
                <p>{{ $category->name }}</p>
            </div>
            <ul class="grid grid-cols-5-adaptive">
                @foreach ($products as $product)
                    <li>
                        <a href="{{ route('OpenProduct', ['product_id' => $product->id]) }}">
                            <div class="goods-block relative mb-8">
                                <div class="max-w-32 w-full my-0 mx-auto ">
                                    <img src="{{ asset($product->photo) }}" alt="" class="w-full mb-3">
                                    <div class="text-center text-xs font-bold">
                                        <p>{{ $product->name }}</p>
                                    </div>
                                    <div class="absolute bottom-5 absolute-center font-bold">
                                        <p>{{ $product->price }}₽</p>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection
