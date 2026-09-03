<?php

namespace App\Livewire;

use App\Models\Job;
use App\Repositories\LocationRepository;
use Livewire\Component;

class LocationSearch extends Component
{
    public ?Job $job = null;
    public $search = '';
    public $locations = [];
    public $selectedLocationId = null;
    public $name = '';

    public function mount($job = null)
    {
        $this->job = $job;
        if($this->job){
            $this->selectedLocationId = $this->job->location_id;
            $this->getLocation();
            $this->selectLocation($this->selectedLocationId,$this->name);
        }
    }

    public function getLocation()
    {
        $locationRepo = new LocationRepository();
        $location = $locationRepo->getLocation($this->selectedLocationId);
        $this->name = $location->city;
    }

   public function selectLocation(int $id, string $cityName): void
    {
        $this->selectedLocationId = $id;
        $this->search = $cityName;   
        $this->locations = [];          
    }

    public function updatedSearch(): void
    {
        $locationRepo = new LocationRepository();
        $this->locations = $locationRepo->locationSearch($this->search);
    }

    public function render()
    {
        return view('livewire.location-search');
    }
}