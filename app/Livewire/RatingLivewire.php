<?php

namespace App\Livewire;

use Livewire\Component;

class RatingLivewire extends Component
{
    public int $scoreValue = 0;

    public function updateScore(int $value): void
    {
        $this->scoreValue = $value;
    }

    public function render()
    {
        return view('livewire.rating-livewire');
    }
    
}