<div class="location-search-container">
    <div class="input-group">
        <span class="input-group-text">
            <img src="{{ asset('storage/images/icons/location.svg') }}" style="width: 20px;">
        </span>
        /** wire:model.live.debounce.300ms is so there will be pause while user types  */
        <input type="text" 
               wire:model.live.debounce.300ms="search" 
               class="form-control custom-input" 
               placeholder="{{__('helperJobCreate.Search city...')}}">
    </div>
    
    <input type="hidden" name="location_id" wire:model="selectedLocationId">

    @if(!empty($search) && count($locations) > 0)
        <ul class="list-group position-absolute w-100 shadow-sm mt-1" style="z-index: 1000;">
            @foreach($locations as $location)
                <li wire:click="selectLocation({{ $location->id }}, '{{ $location->city }}')"
                    class="list-group-item list-group-item-action"
                    style="cursor:pointer;">
                    {{ $location->city }}
                </li>
            @endforeach
        </ul>
    @endif
</div>