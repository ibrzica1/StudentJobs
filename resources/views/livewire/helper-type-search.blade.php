<div>
    <input type="text" name="title" placeholder="{{__('helperJobCreate.e.g. Moving Helper')}}"
    wire:model.live="search">
    <ul>
        @foreach ($helperTypes as $type)
            <li wire:click="selectHelperType('{{$type}}')" style="cursor: pointer;">
                {{$type}}</li>
        @endforeach
    </ul>
</div>