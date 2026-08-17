<?php
 use App\Models\Job;
?>

<div class="d-flex justify-content-end 
align-items-center column-gap-3 mx-4 my-2">
    <label for="">{{ __('homepage.Select category') }}</label>
    <select wire:model="category" 
        class="form-select w-25 border rounded">
        <option value="all">{{__("categories.All")}}</option>
        @foreach (Job::ALLOWED_HELPER_TYPES as $category)
            <option value="{{$category}}">{{__("categories.$category")}}</option>
        @endforeach
    </select>
    <button wire:click='filterByCategory()'
    class="btn btn-secondary">
        {{ __('categories.Filter') }}
    </button>
</div>
