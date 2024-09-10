@props(['status'])

@php
    $classes = "mb-4 font-medium text-xs bg-green-100 p-2 pl-6 text-green-700 uppercase border-l-4 border-green-700";
@endphp

@if ($status) 
    <div {{ $attributes->merge(['class' => $classes]) }}>
        {{ $status }}
    </div>
@endif
