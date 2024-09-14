@if($properties && count($properties) != 0)
<div class="grid grid-cols-3 gap-4">
    @foreach ($properties as $property)
    @livewire('property-card', ['property' => $property])
    @endforeach
</div>
<div class="mt-4">
    {{ $properties->links() }}
</div>
@else
<x-empty />
@endif