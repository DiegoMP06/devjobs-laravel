@props(['value'])

@php
    $classes = "block font-medium text-sm text-gray-700 dark:text-indigo-100";
@endphp

<label {{ $attributes->merge(['class' => $classes]) }}>
    {{ $value ?? $slot }}
</label>
