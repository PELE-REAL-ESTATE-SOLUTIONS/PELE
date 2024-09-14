<button {{ $attributes->merge(['class' => 'bg-custom-blue hover:bg-[#0082CC] text-white font-bold py-2 px-5 rounded-md
    flex items-center justify-center']) }}>
    {{ $slot }}
</button>