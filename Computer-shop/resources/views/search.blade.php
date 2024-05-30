@extends('layouts.app')

@section('content')
    <div class="search-main">
        <div class="max-w-6xl w-full h-auto mx-auto my-0">
            <ul class="grid grid-cols-5">
                @foreach ($results as $result)
                    <li>
                        <a href="{{ route('OpenProduct', ['product_id' => $result->id]) }}">
                            <div class="goods-block relative mb-8">
                                <div class="max-w-32 w-full my-0 mx-auto ">
                                    <img src="{{ asset($result->photo) }}" alt="" class="w-full mb-3">
                                    <div class="text-center text-xs font-bold">
                                        <p>{{ $result->name }}</p>
                                    </div>
                                    <div class="absolute bottom-5 absolute-center font-bold">
                                        <p>{{ $result->price }} ₽</p>
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
