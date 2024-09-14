@props(['name'])

<textarea {{ $attributes->merge(['id' => $name, 'name'=> $name ]) }}
    class="peer pe-0 ps-2 block w-full bg-transparent border-y-2 border-x-transparent border-y-gray-200 focus:border-x-transparent focus:border-y-custom-blue focus:ring-0 disabled:opacity-50 disabled:pointer-events-none dark:border-y-neutral-600 dark:text-white dark:placeholder-neutral-500"
    required>{{old($name)}}
</textarea>