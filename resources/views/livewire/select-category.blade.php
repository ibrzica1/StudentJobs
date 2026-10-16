<?php
 use App\Models\Job;
 use App\Enums\JobCategories;
?>

<div class="d-flex justify-content-end 
align-items-center column-gap-3 mx-4 my-2">
    <label for="">{{ __('homepage.Select category') }}</label>
    <select wire:model="category" 
        class="form-select w-25 border rounded">
        <option value="all">{{__("categories.All")}}</option>
        @foreach (JobCategories::cases() as $category)
            <option value="{{$category->value}}">{{__("categories.$category->value")}}</option>
        @endforeach
    </select>
    <button wire:click='filterByCategory()'
    class="btn btn-secondary">
        {{ __('categories.Filter') }}
    </button>
</div>
