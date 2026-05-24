<div>
     <input type="text" wire:model.live="search" placeholder="Search city">
     <input type="hidden" name="location_id" wire:model="selectedLocationId">

    <ul>
        @foreach($locations as $location)
            <li wire:click="selectLocation({{ $location->id }}, '{{ $location->city }}')"
            style="cursor:pointer;">
                {{ $location->city }}</li>
        @endforeach
    </ul>
</div>