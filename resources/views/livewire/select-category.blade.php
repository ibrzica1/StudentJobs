<?php
 use App\Models\Job;
?>

<div class="d-flex justify-content-end 
align-items-center column-gap-3 mx-4 my-2">
    <label for="">{{ __('Select category') }}</label>
    <select wire:model="category" 
        class="form-select w-25 border rounded">
        <option value="all">All</option>
        @foreach (Job::ALLOWED_HELPER_TYPES as $category)
            <option value="{{$category}}">{{$category}}</option>
        @endforeach
    </select>
    <button wire:click='filterByCategory()'
    class="btn btn-secondary">
        Filter
    </button>
</div>
