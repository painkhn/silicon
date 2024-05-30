<footer class="w-full bg-primary py-5 pb-14">
    <div class="max-w-6xl w-full my-0 mx-auto">
        <div class="flex justify-between mb-8">
            <div class="logo">
                <a href="{{ route('index') }}">
                    <img src="{{ asset('img/logo-footer.png') }}" alt="">
                </a>
            </div>
            <div class="border-l border-black text-white border-grey pl-5 ">
                <div class="title font-bold mb-3">
                    <h3>Контакты</h3>
                </div>
                <div class="pl-3 mb-3">
                    <ul class="leading-loose">
                        <li>Иркутск, Ленина, 5а</li>
                        <li>(812) 555-32-161</li>
                        <li>silicon@shop.ru</li>
                    </ul>
                </div>
                <div class="flex items-center text-3xl">
                    <p>RU</p>
                    <img src="{{ asset('img/ru-icon.png') }}" alt="" class="ml-5">
                </div>
            </div>
        </div>
        <hr class="border-grey mb-5">
        <div class="text-center text-lg text-white">
            <p>Создавайте, исследуйте, вдохновляйтесь.</p>
        </div>
    </div>
</footer>
