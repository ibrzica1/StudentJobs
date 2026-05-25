<?php

namespace App\Livewire;

use App\Models\Job;
use Livewire\Component;

class HelperTypeSearch extends Component
{
    public $search = '';
    public $helperTypes = [];


    public function selectHelperType($helperType)
    {
        $this->search = $helperType;
        $this->helperTypes = [];
    }

    public function updatedSearch()
    {
        if(strlen($this->search) >= 2){
            foreach(Job::ALLOWED_HELPER_TYPES as $type)
            {
                if(str_contains(strtolower($type),strtolower($this->search))){
                    array_push($this->helperTypes,$type);
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.helper-type-search');
    }
}