 @if ($job->company === null)
    <img src="{{ asset('storage/images/company_logo/default.png') }}"
    class="rounded-circle shadow-sm mb-3 d-block mx-auto"
    width="130"
    height="130"
    style="object-fit: cover;">
@else
    <img src="{{ asset('storage/images/company_logo/'.$job->company->logo) }}"
    class="rounded-circle shadow-sm mb-3 d-block mx-auto"
    width="130"
    height="130"
    style="object-fit: cover;">
@endif
<div class="text-center text-muted small">
    Published {{$time->calculateTime($job->created_at)}}
</div>