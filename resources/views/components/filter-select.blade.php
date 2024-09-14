@props(['name'])

<select {{ $attributes->merge(['class' => 'w-full md:w-auto appearance-none bg-white dark:bg-gray-800 dark:text-gray-400
   border border-gray-300 dark:border-none rounded-md px-3 py-2 pr-8 focus:outline-none focus:ring-2
   focus:ring-custom-purple focus:border-transparent']) }} name="{{ $name }}" id="{{ $name }}">
   {{ $slot }}
</select>