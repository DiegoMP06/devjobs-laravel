@props(['disabled' => false])

@php
    $classes = "border-gray-300 dark:border-gray-400 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-gray-600 focus:ring-indigo-500 dark:focus:ring-gray-600 rounded-md shadow-sm";
@endphp

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => $classes]) !!}>