<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Mobility extends Component
{
    private $user;
    public $carLicense;
    public $carAvailable;
    public $truckLicense;

    public function __construct()
    {
       $this->user = Auth::user();
       $this->carLicense = $this->user->car_licence;
       $this->carAvailable = $this->user->car_available;
       $this->truckLicense = $this->user->truck_licence;
    }

    public function uppdateCarLicense(bool $state)
    {
        $this->carLicense = $state;
    }

    public function uppdateCarAvailable(bool $state)
    {
        $this->carAvailable = $state;
    }

    public function uppdateTruckLicense(bool $state)
    {
        $this->truckLicense = $state;
    }

    public function render()
    {
        return view('livewire.mobility-livewire');
    }
}