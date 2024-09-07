@props(['type', 'name'])

@php
    if ($type == 'checkbox') {
        $class = "h-4 w-4 text-[#8F00FF] focus:ring-[#8F00FF] border-gray-300 rounded";
    } else {
        $class = "mt-1 block w-full px-4 py-3 bg-white border border-gray-300 rounded-full shadow-sm focus:outline-none focus:ring-[#8F00FF] focus:border-[#8F00FF]";
    }
@endphp

<input {{ $attributes->merge(['class' => $class, 'name' => $name, 'type' => $type]) }} required :value="old('{{ $name }}')"  />