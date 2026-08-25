<?php

namespace App\Livewire;

use Livewire\Component;

class WageRange extends Component
{
    public $wage = 17;
    public $showSad = false;
    public $showNeutral = true;
    public $showSmile = false;
    public $showHappy = false;

    public function updateWage(int $amount): void
    {
        $this->wage = $amount;
        $this->updateIcon();
    }

    public function updateIcon(): void
    {
        switch($this->wage){
            case($this->wage >= 14 && $this->wage < 16):
                $this->showSad = true;
                $this->showNeutral = false;
                $this->showSmile = false;
                $this->showHappy = false;
                break;
            case($this->wage >= 16 && $this->wage < 20):
                $this->showSad = false;
                $this->showNeutral = true;
                $this->showSmile = false;
                $this->showHappy = false;
                break;
            case($this->wage >= 20 && $this->wage < 25):
                $this->showSad = false;
                $this->showNeutral = false;
                $this->showSmile = true;
                $this->showHappy = false;
                break;
            case($this->wage >= 25 && $this->wage <= 29):
                $this->showSad = false;
                $this->showNeutral = false;
                $this->showSmile = false;
                $this->showHappy = true;
                break;
        }
    }

    public function render()
    {
        return view('livewire.wage-range');
    }
}