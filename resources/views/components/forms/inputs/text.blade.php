@props(['value' => null, 'type' => 'text', 'error' => null])

<input
    type="{{ $type }}"
    @class([
        'block text-18 mt-5 mb-15 py-5 px-10 w-1_4 h-30 border-1-gray rounded-8 box-shadow focus-bg-change',
        'border-red' => !empty($error),
        $attributes->get('class'),
    ])
    {{ $attributes->except('class', 'type') }}
    value="{{ $value }}"
/>