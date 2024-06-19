@props(['name'])

<x-forms.row {{ $attributes }}>
    <div>
        <label class="inline-flex">
            {{ $slot }}
            {{ $label }}
        </label>
    </div>
</x-forms.row>