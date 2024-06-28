<input type="hidden" name="{{ $name }}" value="{{ $currentValue }}" />

<button
    name="{{ $name }}"
    value="{{ $nextValue }}"
    @class([
        'flex content-center pointer ml-10 text-18 font-times bg-white bg-gray hover-bg-dark-gray rounded-8 px-15 py-5 border-1 border-gray',
        'hover-text-purple' => !$currentValue,
        'text-purple underline font-bold' => $currentValue,
    ])
>
    {{ $slot }}
    @if ($showAscIcon())
        <img class="h-20" src="/assets/images/up.png" />
    @endif
    @if ($showDescIcon())
        <img class="h-20" src="/assets/images/down.png" />
    @endif

</button>