<?php

namespace App\Livewire;

use App\Repositories\LocationRepository;
use Livewire\Component;

class LocationSearch extends Component
{
    public $search = '';
    public $locations = [];
    public $selectedLocationId = null;

   public function selectLocation($id, $cityName)
    {
        $this->selectedLocationId = $id;
        $this->search = $cityName;   
        $this->locations = [];          
    }

    public function updatedSearch()
    {
        $locationRepo = new LocationRepository();
        $this->locations = $locationRepo->locationSearch($this->search);
    }

    public function render()
    {
        return view('livewire.location-search');
    }
}