<div>
    <div>
        <img src="{{ asset('storage/images/icons/sad.png') }}" width="20%" height="20%"
        wire:show="showSad">
        <img src="{{ asset('storage/images/icons/neutral.png') }}" width="20%" height="20%"
        wire:show="showNeutral">
        <img src="{{ asset('storage/images/icons/smile.png') }}" width="20%" height="20%"
        wire:show="showSmile">
        <img src="{{ asset('storage/images/icons/happy.png') }}" width="20%" height="20%"
        wire:show="showHappy">
    </div>
    <input type="range" wire:input="updateWage($event.target.value)"
     name="wage" min=14 max=29 value={{$wage}} step="0.5">
    <p>{{$wage}} euros per hour</p>
</div>