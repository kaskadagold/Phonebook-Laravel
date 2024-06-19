@props(['value' => null, 'type' => 'text', 'error' => null])

<input
    type="{{ $type }}"
    @class([
        'border-red' => !empty($error),
        $attributes->get('class'),
    ])
    {{ $attributes->except('class', 'type') }}
    value="{{ $value }}"
/>