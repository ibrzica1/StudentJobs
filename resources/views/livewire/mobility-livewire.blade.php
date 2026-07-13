<form
    wire:submit="save">
    <hr class="my-4">

    {{-- MOBILITY --}}
    <h6 class="text-uppercase text-muted fw-bold mb-3">
        Mobility
    </h6>

    <div class=" mb-3">
        <label for="car_licence" class="form-label">Car driving licence</label>
        <div class="input-group column-gap-3 mb-2">
            <input type="hidden" wire:model="car_licence">
            <button type="button"
                    wire:click=uppdateCarLicense(true)
                    class="{{$car_licence ? 'bg-success text-white' : 'bg-secondary-subtle'}}
                    col-5 h-50px btn rounded">
                YES
            </button>    
            <button type="button"
                    wire:click=uppdateCarLicense(false)
                    class="{{$car_licence === 0 ? 'bg-success text-white' : 'bg-secondary-subtle'}}
                    col-5 h-50px btn rounded">
                NO
            </button>
        </div>

        <label for="car_available" class="form-label">Are there any cars available?</label>
        <div class="input-group column-gap-3 mb-2">
            <input type="hidden" wire:model="car_available">
            <button type="button"
                    wire:click=uppdateCarAvailable(true)
                    class="{{$car_available ? 'bg-success text-white' : 'bg-secondary-subtle'}}
                    col-5 h-50px btn rounded">
                YES
            </button>    
            <button type="button"
                    wire:click=uppdateCarAvailable(false)
                    class="{{$car_available === 0 ? 'bg-success text-white' : 'bg-secondary-subtle'}}
                    col-5 h-50px btn rounded">
                NO
            </button>
        </div>

        <label for="truck_licence" class="form-label">Truck driver's license</label>
        <div class="input-group column-gap-3 mb-2">
            <input type="hidden" wire:model="truck_licence">
            <button type="button"
                    wire:click=uppdateTruckLicense(true)
                    class="{{$truck_licence ? 'bg-success text-white' : 'bg-secondary-subtle'}}
                    col-5 h-50px btn rounded">
                YES
            </button>    
            <button type="button"
                    wire:click=uppdateTruckLicense(false)
                    class="{{$truck_licence === 0 ? 'bg-success text-white' : 'bg-secondary-subtle'}}
                    col-5 h-50px btn rounded">
                NO
            </button>
        </div>
    </div>

    <button
    type="submit"
    class="btn btn-success btn-lg w-100 py-3">
    SAVE CHANGES
    </button>
 </form>



