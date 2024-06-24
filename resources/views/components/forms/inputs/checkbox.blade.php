@props(['checked' => false, 'error' => null])

<input
    type="checkbox"
    @class([
        'mr-10',
        'border-red' => !empty($error),
        $attributes->get('class'),
    ])
    {{ $attributes->except('class', 'type') }}
    @checked($checked)
>