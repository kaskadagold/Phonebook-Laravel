@props(['value' => null, 'type' => 'text'])

<input
    type="{{ $type }}"
    @class([
        $attributes->get('class'),
    ])
    {{ $attributes->except('class') }}
    value="{{ $value }}"
/>