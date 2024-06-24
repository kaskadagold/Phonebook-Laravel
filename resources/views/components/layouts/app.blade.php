@props(['pageTitle' => 'Телефонный справочник', 'headerTitle' => null])

<!DOCTYPE html>
<html lang="ru">

<head>
    <title>{{ $pageTitle }}</title>
    <link rel="stylesheet" href="/assets/css/main.css">
    <link rel="stylesheet" href="/assets/css/background.css">
    <link rel="stylesheet" href="/assets/css/border.css">
    <link rel="stylesheet" href="/assets/css/display.css">
    <link rel="stylesheet" href="/assets/css/margin.css">
    <link rel="stylesheet" href="/assets/css/padding.css">
    <link rel="stylesheet" href="/assets/css/sizes.css">
    <link rel="stylesheet" href="/assets/css/text.css">
</head>

<body>
    <x-layouts-parts.header headerTitle="{{ $headerTitle ?? $pageTitle }}"/>

    <main class="my-0 mx-15">
        {{ $slot }}
    </main>
</body>

</html>