@props(['for'])

<x-forms.row {{ $attributes }}>
    <label for="{{ $for }}">{{ $label }}</label>
    {{ $slot }}
</x-forms.row>