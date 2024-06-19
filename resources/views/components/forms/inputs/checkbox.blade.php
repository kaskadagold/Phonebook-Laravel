@props(['checked' => false])

<input
    type="checkbox"
    @class([
        'checkbox',
        $attributes->get('class'),
    ])
    {{ $attributes->except('class') }}
    @checked($checked)
>