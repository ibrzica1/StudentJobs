<div>
    <input type="text" name="title" placeholder="e.g. Moving Helper"
    wire:model.live="search">
    <ul>
        @foreach ($helperTypes as $type)
            <li wire:click="selectHelperType('{{$type}}')" style="cursor: pointer;">
                {{$type}}</li>
        @endforeach
    </ul>
</div>