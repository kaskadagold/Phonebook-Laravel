@props(['messages'])

<div {{ $attributes }}>
    <div role="alert" class="inline-flex py-12 px-15 text-20 text-red bg-red rounded-8">
        @foreach ($messages as $message)
            <p class="m-0">{{ $message }}</p>
        @endforeach
    </div>
</div>
