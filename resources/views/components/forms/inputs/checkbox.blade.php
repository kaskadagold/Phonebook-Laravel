@props(['checked' => false, 'error' => null])

<input
    type="checkbox"
    @class([
        'checkbox',
        'border-red' => !empty($error),
        $attributes->get('class'),
    ])
    {{ $attributes->except('class', 'type') }}
    @checked($checked)
>