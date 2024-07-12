@props(['error' => null])

<select
    @class([
        'block rounded-8 px-10 py-5 text-16 mt-5 mb-15 border-1 box-shadow focus-border-change',
        'border-red' => !empty($error),
        'border-gray' => empty($error),
        $attributes->get('class'),
    ])
    {{ $attributes->except('class') }}
>
    {{ $slot }}
</select>