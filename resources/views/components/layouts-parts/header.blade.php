@props(['headerTitle' => ''])

<header>
    <a href="/">
        <h2>{{ $headerTitle }}</h2>
    </a>

    <div class="auth-container">
        <a class="auth" href="{{ route('register') }}">
            <img src="assets/images/registration.png">
            Регистрация
        </a>

        <a class="auth" href="{{ route('login') }}">
            <img src="assets/images/authorization.png">
            Авторизация                
        </a>
    </div>

    {{-- <div class="auth-container">
        <a class="auth">
            <img src="/assets/images/admin.png">
            Админка
        </a>

        <a class="auth" href="{{ route('account') }}">
            <img src="/assets/images/profile.png">
            Имя пользователя
        </a>

        <a class="auth" href="{{ route('logout') }}">
            <img src="/assets/images/logout.png">
            Выйти
        </a>
    </div> --}}
</header>