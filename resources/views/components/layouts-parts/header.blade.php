@props(['headerTitle' => ''])

<header class="flex content-between pt-10 pb-30 px-15">
    <a href="/">
        <h2 class="m-0 font-bold">{{ $headerTitle }}</h2>
    </a>

    @auth
        <x-panels.user-authorized-menu />
    @else
        <x-panels.user-not-authorized-menu />
    @endauth
</header>