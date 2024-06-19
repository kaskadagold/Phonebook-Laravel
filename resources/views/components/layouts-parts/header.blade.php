@props(['headerTitle' => ''])

<header>
    <a href="/">
        <h2>{{ $headerTitle }}</h2>
    </a>

    <!-- <div class="auth-container">
        <div class="auth">
            <img src="assets/images/registration.png">
            Регистрация
        </div>

        <div class="auth">
            <img src="assets/images/authorization.png">
            Авторизация                
        </div>
    </div> -->

    <div class="auth-container">
        <a class="auth">
            <img src="/assets/images/admin.png">
            Админка
        </a>

        <a class="auth">
            <img src="/assets/images/profile.png">
            Имя пользователя
        </a>

        <a class="auth">
            <img src="/assets/images/logout.png">
            Выйти
        </a>
    </div>
</header>