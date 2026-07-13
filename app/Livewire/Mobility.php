<?php

namespace App\Livewire;

use App\Http\Requests\ProfileMobilityUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Mobility extends Component
{
    private $user;
    public $car_licence;
    public $car_available;
    public $truck_licence;

    public function __construct()
    {
       $this->user = Auth::user();
       $this->car_licence = $this->user->car_licence;
       $this->car_available = $this->user->car_available;
       $this->truck_licence = $this->user->truck_licence;
    }

    public function save()
    {
        $validated = $this->validate([
            'car_licence' => ['nullable', 'boolean'],
            'car_available' => ['nullable', 'boolean'],
            'truck_licence' => ['nullable', 'boolean'],
        ]);
      
       Auth::user()->update($validated);

        $this->redirect(route('profile.edit'));
    }

    public function uppdateCarLicense($state)
    {
        $this->car_licence = $state;
    }

    public function uppdateCarAvailable($state)
    {
        $this->car_available = $state;
    }

    public function uppdateTruckLicense($state)
    {
        $this->truck_licence = $state;
    }

    public function render()
    {
        return view('livewire.mobility-livewire');
    }
}