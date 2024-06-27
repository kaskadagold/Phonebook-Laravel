@props(['messages'])

<div {{ $attributes }}>
    <div role="alert" class="text-green bg-green rounded-8">
        @foreach ($messages as $message)
            <p>{{ $message }}</p>
        @endforeach
    </div>
</div>