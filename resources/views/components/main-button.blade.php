@props(["tag" => "button", "path", "color" => "bg-custom-blue"])

@if ($tag == "a")
<a href="{{ $path }}" class="{{ $color }} hover:opacity-80 text-white font-bold py-2 px-5 rounded-md flex items-center">
    {{ $slot }}
</a>
@else
<button type="submit" class="{{ $color }} hover:opacity-80 text-white font-bold py-2 px-5 rounded-md flex items-center">
    {{ $slot }}
</button>
@endif