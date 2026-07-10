<div class=" mb-3">
    <label for="carLicense" class="form-label">Car driving licence</label>
    <div class="input-group column-gap-3 mb-2">
        <input type="hidden" wire:model="carLicense">
        <button type="button"
                wire:click=uppdateCarLicense(true)
                class="{{$carLicense ? 'bg-success text-white' : 'bg-secondary-subtle'}}
                col-5 h-50px btn rounded">
            YES
        </button>    
        <button type="button"
                wire:click=uppdateCarLicense(false)
                class="{{$carLicense === false ? 'bg-success text-white' : 'bg-secondary-subtle'}}
                col-5 h-50px btn rounded">
            NO
        </button>
    </div>

    <label for="carAvailable" class="form-label">Are there any cars available?</label>
    <div class="input-group column-gap-3 mb-2">
        <input type="hidden" wire:model="carAvailable">
        <button type="button"
                wire:click=uppdateCarAvailable(true)
                class="{{$carAvailable ? 'bg-success text-white' : 'bg-secondary-subtle'}}
                col-5 h-50px btn rounded">
            YES
        </button>    
        <button type="button"
                wire:click=uppdateCarAvailable(false)
                class="{{$carAvailable === false ? 'bg-success text-white' : 'bg-secondary-subtle'}}
                col-5 h-50px btn rounded">
            NO
        </button>
    </div>

    <label for="truckLicense" class="form-label">Truck driver's license</label>
    <div class="input-group column-gap-3 mb-2">
        <input type="hidden" wire:model="truckLicense">
        <button type="button"
                wire:click=uppdateTruckLicense(true)
                class="{{$truckLicense ? 'bg-success text-white' : 'bg-secondary-subtle'}}
                col-5 h-50px btn rounded">
            YES
        </button>    
        <button type="button"
                wire:click=uppdateTruckLicense(false)
                class="{{$truckLicense === false ? 'bg-success text-white' : 'bg-secondary-subtle'}}
                col-5 h-50px btn rounded">
            NO
        </button>
    </div>
</div>