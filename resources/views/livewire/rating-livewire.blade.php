<div class="col-md-4 text-center py-3" 
     x-data="{ 
         hoverValue: 0, 
         scoreValue: @entangle('scoreValue') 
     }">
    
    <label class="fw-bold d-block mb-2">
        Rating
    </label>

    <!-- Skriveno polje za formu -->
    <input type="hidden" name="score" x-model="scoreValue">

    <div class="d-flex justify-content-center gap-1">
        @for ($i = 1; $i <= 5; $i++)
            <img :src="(hoverValue >= {{ $i }} || (!hoverValue && scoreValue >= {{ $i }})) 
                    ? '{{ asset('storage/images/icons/star-gold.png') }}' 
                    : '{{ asset('storage/images/icons/star-silver.png') }}'"
                 width="30"
                 height="30"
                 class="rating-star"
                 style="cursor: pointer; object-fit: contain;"
                 @mouseenter="hoverValue = {{ $i }}"
                 @mouseleave="hoverValue = 0"
                 wire:click="updateScore({{ $i }})"
                 @click="scoreValue = {{ $i }}">
        @endfor
    </div>
</div>