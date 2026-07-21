<?php

namespace App\Livewire;

use Livewire\Component;

class SelectCategory extends Component
{
    public $category = 'all';

    public function updateCategory($category)
    {
        $this->category = $category;
    }

    public function filterByCategory()
    {
        if($this->category === 'all'){
            redirect()->route('homepage');
        }
        else{
            redirect()->route('homepage.category',['category' => $this->category]);
        }
    }

    public function render()
    {
        return view('livewire.select-category');
    }
    
}