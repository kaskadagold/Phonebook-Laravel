@props(['value' => null, 'error' => null])

@if ($value)
    <div class="flex items-center justify-center border rounded mt-5">
        <img class="max-w-1_4" src="{{ $value }}">
    </div>
@endif

<input
    type="file"
    @class([
        'block text-16 mt-5 mb-15 py-5 px-10 w-1_4 h-30 border-1 rounded-8 box-shadow focus-border-change',
        'border-red' => !empty($error),
        'border-gray' => empty($error),
        $attributes->get('class'),
    ])
    {{ $attributes->except(['class', 'type']) }}
>
