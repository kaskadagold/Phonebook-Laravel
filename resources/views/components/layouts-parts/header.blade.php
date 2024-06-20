@props(['headerTitle' => ''])

<header>
    <a href="/">
        <h2>{{ $headerTitle }}</h2>
    </a>

    @auth
    <div class="auth-container">
        @admin
        <a class="auth">
            <img src="/assets/images/admin.png">
            Админка
        </a>
        @endadmin

        <a class="auth" href="{{ route('account') }}">
            <img src="/assets/images/profile.png">
            {{ auth()->user()->name }}
        </a>

        <x-forms.form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-forms.submit-button>
                <img src="/assets/images/logout.png">
                Выйти
            </x-forms.submit-button>
        </x-forms.form>
    </div>
    @else
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
    @endauth
</header>