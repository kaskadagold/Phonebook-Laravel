@props(['for', 'error' => null])

<x-forms.row {{ $attributes }}>
    <label for="{{ $for }}" class="text-20">{{ $label }}</label>
    {{ $slot }}

    @if (! empty($error))
        <span class="text-12 italic text-red">{{ $error }}</span>
    @endif
</x-forms.row>