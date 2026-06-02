<?php

namespace App\Livewire;

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
        return view('livewire.navigation-livewire');
    }
}