@props(['name', 'error' => null])

<x-forms.row {{ $attributes }}>
    <div>
        <div>
                <label class="inline-flex text-20">
                    {{ $slot }}
                    {{ $label }}
                </label>
            </div>

            @if (! empty($error))
                <span class="text-12 italic text-red">{{ $error }}</span>
            @endif
    </div>
</x-forms.row>