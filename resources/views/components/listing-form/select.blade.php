@props(['name'])

<select {{ $attributes->merge(['id' => $name, 'name'=> $name ]) }} value="{{old($name)}}"
    class="peer pe-0 ps-2 block w-full bg-transparent border-t-transparent border-b-2 border-x-transparent
    border-b-gray-200 focus:border-t-transparent focus:border-x-transparent focus:border-b-custom-blue focus:ring-0
    disabled:opacity-50 disabled:pointer-events-none dark:border-b-neutral-700 dark:text-white
    dark:placeholder-neutral-500"
    required>
    {{ $slot }}
</select>