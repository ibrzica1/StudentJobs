<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NavigationLivewire extends Component
{
    public $showMenu = false;
    public $showProfile = false;

    public function toggleMenu()
    {
        $this->showMenu = !$this->showMenu;
    }

    public function toggleProfile()
    {
        $this->showProfile = !$this->showProfile;
    }

    public function render()
    {
        $user = Auth::user();
        
        return view('livewire.navigation-livewire', [
            'user' => $user
        ]);
    }
}