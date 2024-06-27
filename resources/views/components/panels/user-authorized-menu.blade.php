<nav class="flex content-around">
    @admin
    <a class="flex content-between pointer">
        <img class="w-20 h-20 pr-3 pl-15" src="/assets/images/admin.png">
        Админка
    </a>
    @endadmin

    <a class="flex content-between pointer" href="{{ route('account') }}">
        <img class="w-20 h-20 pr-3 pl-15" src="/assets/images/profile.png">
        {{ auth()->user()->name }}
    </a>

    <x-forms.form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="flex content-between p-0 text-16 font-times bg-white border-none pointer">
            <img class="w-20 h-20 pr-3 pl-15" src="/assets/images/logout.png">
            Выйти
        </button>
    </x-forms.form>
</nav>