@props(['for'])

@php
    if ($for === 'remember') {
        $class = "ml-2 block text-sm text-gray-300";
    } else {
        $class = "block text-sm font-medium text-gray-300";
    }
@endphp

<label {{ $attributes->merge(['class' => $class]) }}>
    {{ $slot }}
</label>