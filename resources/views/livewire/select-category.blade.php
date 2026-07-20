<?php
 use App\Models\Job;
?>
<div>
    <select wire:model="category">
        <option value="">All</option>
        @foreach (Job::ALLOWED_HELPER_TYPES as $category)
            <option value="{{$category}}">{{$category}}</option>
        @endforeach
    </select>
    <button wire:click='filterByCategory()'>
        Filter
    </button>
</div>
