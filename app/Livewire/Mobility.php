<?php

namespace App\Livewire;

use App\Http\Requests\ProfileMobilityUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;

class Mobility extends Component
{
    private object $user;
    public bool $car_licence;
    public bool $car_available;
    public bool $truck_licence;

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

    public function uppdateCarLicense(bool $state): void
    {
        $this->car_licence = $state;
    }

    public function uppdateCarAvailable(bool $state): void
    {
        $this->car_available = $state;
    }

    public function uppdateTruckLicense(bool $state): void
    {
        $this->truck_licence = $state;
    }

    public function render()
    {
        return view('livewire.mobility-livewire');
    }
}