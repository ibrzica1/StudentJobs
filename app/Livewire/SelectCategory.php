<?php

namespace App\Livewire;

use Livewire\Component;

class SelectCategory extends Component
{
    public $category = '';

    public function updateCategory($category)
    {
        $this->category = $category;
    }

    public function filterByCategory()
    {
        redirect()->route('homepage.category',['category' => $this->category]);
    }

    public function render()
    {
        return view('livewire.select-category');
    }
    
}