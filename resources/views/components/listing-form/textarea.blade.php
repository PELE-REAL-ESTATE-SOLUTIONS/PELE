@props(['name'])

<textarea id="{{ $name }}" name="{{ $name }}" :value="old('{{ $name }}')" {{ $attributes }}
    class="peer pe-0 ps-2 block w-full bg-transparent border-y-2 border-x-transparent border-y-gray-200 focus:border-x-transparent focus:border-y-blue-500 focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-b-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600 dark:focus:border-b-neutral-600">
</textarea>