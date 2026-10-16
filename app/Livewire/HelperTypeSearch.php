<?php

namespace App\Livewire;

use App\Enums\JobCategories;
use App\Models\Job;
use Livewire\Component;

class HelperTypeSearch extends Component
{
    public ?Job $job = null;
    public $search = '';
    public $helperTypes = [];

    public function mount(?Job $job = null)
    {
        $this->job = $job;
        if($this->job){
            $this->search = $this->job->category;
        }
    }

    public function selectHelperType(string $helperType): void
    {
        $this->search = $helperType;
        $this->helperTypes = [];
    }

    public function updatedSearch(): void
    {
        if(strlen($this->search) >= 2){
            foreach(JobCategories::cases() as $type)
            {
                if(str_contains(strtolower($type->value),strtolower($this->search))){
                    array_push($this->helperTypes,$type->value);
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.helper-type-search');
    }
}