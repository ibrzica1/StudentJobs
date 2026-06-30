<?php

namespace App\Livewire;

use Livewire\Component;

class ProfileLivewire extends Component
{
    public $showAddCompany = false;

    public function toggleAddCompany()
    {
        $this->showAddCompany = !$this->showAddCompany;
    }
    
}