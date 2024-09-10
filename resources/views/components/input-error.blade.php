@props(['messages'])

@php
    $classes = "uppercase font-bold p-2 pl-6 mt-4 text-xs text-red-600 bg-red-100 dark:bg-red-200 border-l-4 border-red-600";
@endphp

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li class="{{ $classes }}">{{ $message }}</li>
        @endforeach
    </ul>
@endif
