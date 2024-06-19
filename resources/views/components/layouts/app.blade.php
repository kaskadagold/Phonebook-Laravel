@props(['pageTitle' => 'Телефонный справочник', 'headerTitle' => null])

<!DOCTYPE html>
<html lang="ru">

<head>
    <title>{{ $pageTitle }}</title>
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/adding.css">
    <link rel="stylesheet" href="/assets/css/header.css">
    <link rel="stylesheet" href="/assets/css/buttons.css">
    <link rel="stylesheet" href="/assets/css/classes.css">
</head>

<body>
    <x-layouts-parts.header headerTitle="{{ $headerTitle ?? $pageTitle }}"/>

    <main>
        {{ $slot }}
    </main>
</body>

</html>