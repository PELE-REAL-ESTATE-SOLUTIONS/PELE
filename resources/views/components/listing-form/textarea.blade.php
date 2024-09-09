@props(['name'])

<textarea id="{{ $name }}" name="{{ $name }}" :value="old('{{ $name }}')" {{ $attributes }}
    class="peer pe-0 ps-2 block w-full bg-transparent border-y-2 border-x-transparent border-y-gray-200 focus:border-x-transparent focus:border-y-custom-blue focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-y-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500">
</textarea>