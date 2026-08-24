<?php

namespace App\Livewire;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NavigationLivewire extends Component
{
    public $showMenu = false;
    public $showProfile = false;
    public $showLocale = false;
    public string $locale;

    public function mount()
    {
        $this->locale = App::getLocale();
    }

    public function toggleLocale()
    {
        $this->showLocale = !$this->showLocale;
    }

    public function setLocale(string $newlocale)
    {
        $this->locale = $newlocale;
        $this->toggleLocale();
    }

    public function updateLocale()
    {
        redirect()->route('locale.set',['locale' => $this->locale]);
    }

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