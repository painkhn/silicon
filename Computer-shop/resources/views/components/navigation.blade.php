<div class="nav w-full h-12 bg-primary mb-10">
    <nav class="max-w-6xl h-full mx-auto my-0 flex items-center">
        <div class="all h-full bg-black text-white flex items-center max-w-48 w-full justify-center rounded-2xl">
            <a href="{{ route('index') }}">ГЛАВНАЯ СТРАНИЦА</a>
        </div>
        <ul class="text-white flex text-sm">
            <li class="ml-8"><a href="{{ route('profile') }}">ЛИЧНЫЙ КАБИНЕТ</a></li>
            @if (Auth::user())
                {{-- <li class="ml-8"><a href="{{ route('logout') }}">ВЫХОД</a></li> --}}
                <a class="ml-8" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('ВЫХОД') }}</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            @endif
            @if (Auth::user() and Auth::user()->is_admin == true)
                <li class="ml-8"><a href="{{ route('Admin') }}">ПАНЕЛЬ АДМИНИСТРАТОРА</a></li>
            @endif
        </ul>
    </nav>
</div>
