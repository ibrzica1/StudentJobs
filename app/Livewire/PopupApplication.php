<?php

namespace App\Livewire;

use App\Models\Application;
use App\Repositories\ApplicationRepository;
use Livewire\Component;

class PopupApplication extends Component
{
    public Application $application;
    public bool $showPopup = false;

    public function mount(Application $application)
    {
        $this->application = $application;
    }

    public function open(): void
    {
        $this->showPopup = true;
        (new ApplicationRepository())->changeSeenStatus($this->application);
    }

    public function close(): void
    {
        $this->showPopup = false;
    }

    public function render()
    {
        return view('livewire.popup-application');
    }
}