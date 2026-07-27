<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
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
        $user = Cache::remember('user',600, function () {
            return Auth::user();
            });
        
        return view('livewire.navigation-livewire', [
            'user' => $user
        ]);
    }
}