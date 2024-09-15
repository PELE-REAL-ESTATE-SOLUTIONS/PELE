@props(['active'])

@php
$classes = ($active ?? false)
? 'px-4 py-1 text-custom-blue transition-colors bg-gray-100 dark:bg-gray-800 rounded'
: 'px-4 py-1 text-custom-purple hover:text-custom-blue transition-colors';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>