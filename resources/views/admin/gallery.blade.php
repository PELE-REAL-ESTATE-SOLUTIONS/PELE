<x-admin-layout>

    <div class="py-5">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-4 w-full flex items-center justify-between">
                <div>
                    <h1 class="text-xl font-bold text-custom-blue leading-tight">Photos</h1>
                    <a href="{{ route('review', ['property' => $property]) }}"
                        class="text-sm text-gray-400 leading-relaxed">&larr; Go
                        Back</a>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @if($pictures && is_array($pictures))
                @foreach($pictures as $picture)
                <div
                    class="border rounded-xl overflow-hidden h-72 md:h-96 p-4 col-span-1 gallery-item flex items-center justify-center">
                    <img src="{{ asset('storage/' . $picture) }}" alt="Property Image" class="">
                </div>
                @endforeach
                @else
                <p>No images available for this property.</p>
                @endif
                {{-- @foreach ($properties as $property)
                @livewire('property-card', ['property' => $property])
                @endforeach --}}
            </div>

            <div class="mt-4">
                {{-- {{ $properties->links() }} --}}
            </div>

        </div>
    </div>
</x-admin-layout>