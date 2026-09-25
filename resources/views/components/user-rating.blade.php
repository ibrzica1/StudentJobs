<div class="d-flex justify-content-center gap-1">
    @for ($i = 1; $i <= 5; $i++)
        @if ($i > $rating || $rating === NULL)
            @if ($i > $rating + 1 || $rating === NULL)
                <img src="{{ asset('storage/images/icons/star-silver.png') }}"
                    width="30"
                    height="30"
                    class="rating-star"
                    style="object-fit: contain;">
            @else
                <img src="{{ asset('storage/images/icons/star-half.png') }}"
                    width="30"
                    height="30"
                    class="rating-star"
                    style="object-fit: contain;">
            @endif
        @else
            <img src="{{ asset('storage/images/icons/star-gold.png') }}"
                width="30"
                height="30"
                class="rating-star"
                style="object-fit: contain;">
        @endif
    @endfor
    
</div>