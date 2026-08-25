<?php

namespace App\Livewire;

use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Symfony\Component\HttpFoundation\RedirectResponse as HttpFoundationRedirectResponse;

class SelectCategory extends Component
{
    public $category = 'all';

    public function updateCategory(string $category): void
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