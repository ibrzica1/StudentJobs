

<div class="d-flex row ml-1 p-2 w-100 custom-input justify-content-center">
    <div class="d-flex row w-100 justify-content-center align-items-center">
        <img src="{{ asset('storage/images/icons/sad.png') }}" style="width:60px; height:40px;"
        wire:show="showSad">
        <img src="{{ asset('storage/images/icons/neutral.png') }}" style="width:60px; height:40px;"
        wire:show="showNeutral">
        <img src="{{ asset('storage/images/icons/smile.png') }}" style="width:60px; height:40px;"
        wire:show="showSmile">
        <img src="{{ asset('storage/images/icons/happy.png') }}"  style="width:60px; height:40px;"
        wire:show="showHappy">
        <input type="range" wire:input="updateWage($event.target.value)"
        name="wage" min=14 max=29 value={{$wage}} step="0.5"
        class="form-range custom-range-slider">
    </div>
    <p class="text-center">{{$wage}} {{__('helperJobCreate.euros per hour')}}</p>
</div>