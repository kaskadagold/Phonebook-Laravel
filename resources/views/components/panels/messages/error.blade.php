@props(['messages'])

<div {{ $attributes }}>
    <div role="alert" class="text-red bg-red rounded-8">
        @foreach ($messages as $message)
            <p>{{ $message }}</p>
        @endforeach
    </div>
</div>