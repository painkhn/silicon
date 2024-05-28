<header class="max-w-6xl mx-auto my-0 h-28 flex items-center justify-between">
    <!-- logo -->
    <div class="logo">
        <a href="index.html">
            <img src="{{ asset('img/logo.png') }}" alt="">
        </a>
    </div>
    <!-- search input -->
    <div class="search flex items-center grow max-w-md">
        <input type="search" name="" id="" class="border border-black max-w-md w-full h-9 rounded-2xl px-4"
            placeholder="Поиск">
        <button class="w-9 h-9 rounded-2xl bg-primary ml-3">
            <svg class="my-0 mx-auto" width="25px" height="25px" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                <g id="SVGRepo_iconCarrier">
                    <path
                        d="M16.6725 16.6412L21 21M19 11C19 15.4183 15.4183 19 11 19C6.58172 19 3 15.4183 3 11C3 6.58172 6.58172 3 11 3C15.4183 3 19 6.58172 19 11Z"
                        stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </g>
            </svg>
        </button>
    </div>
    <!-- корзина -->
    <div class="cart">
        <a href="#!">
            <img src="{{ asset('img/cart-icon.png') }}" alt="">
        </a>
    </div>
</header>
