<div>
    <button type="button" class="btn btn-warning btn-sm" wire:click="open">
        {{__('applications.View Application')}}
    </button>

    @if ($showPopup)
        <div class="popup-overlay" wire:click="close">
            <div class="popup-content" wire:click.stop>
                <button type="button" class="popup-close" wire:click="close">&times;</button>

                {{-- Header --}}
                <div class="popup-avatar-wrapper mb-4">
                    @if ($application->user->profile_picture)
                        <img src="{{asset('storage/images/user_avatar/'.$application->user->profile_picture)}}"
                            class="popup-avatar"
                            width="100"
                            height="100">
                    @else
                        <img src="{{asset('storage/images/user_avatar/avatar-default.png')}}"
                            class="popup-avatar"
                            width="100"
                            height="100">
                    @endif
                    <h4 class="fw-bold mb-1 mt-3">{{$application->user->firstName}} {{$application->user->lastName}}</h4>
                    <p class="text-muted small mb-0">
                        {{__('applications.from')}} {{$application->user->location->city}}
                    </p>
                </div>

                {{-- Application text --}}
                <div class="popup-section">
                    <p class="mb-0">{{$application->text}}</p>
                </div>

                <h6 class="popup-heading">{{__('applications.MORE INFORMATION')}}</h6>

                {{-- University --}}
                <div class="popup-row">
                    <span class="popup-label">{{__('applications.University')}}</span>
                    <span class="popup-value">
                        @if ($application->user->university)
                            <span class="popup-icon-yes">✅</span> {{$application->user->university}}
                        @else
                            <span class="popup-icon-no">❌</span> {{__('applications.None')}}
                        @endif
                    </span>
                </div>

                {{-- Certificates --}}
                <div class="popup-row">
                    <span class="popup-label">{{__('applications.Certificates')}}</span>
                    <span class="popup-value">
                        @if ($application->user->certificates)
                            <span class="popup-icon-yes">✅</span> {{$application->user->certificates}}
                        @else
                            <span class="popup-icon-no">❌</span> {{__('applications.None')}}
                        @endif
                    </span>
                </div>

                <h6 class="popup-heading">{{__('applications.Mobility')}}</h6>

                {{-- Car licence --}}
                <div class="popup-row">
                    <span class="popup-label">{{__('applications.Car licence')}}</span>
                    <span class="popup-value">
                        @if ($application->user->car_licence)
                            <span class="popup-icon-yes">✅</span> {{__('applications.YES')}}
                        @else
                            <span class="popup-icon-no">❌</span> {{__('applications.NO')}}
                        @endif
                    </span>
                </div>

                {{-- Truck licence --}}
                <div class="popup-row">
                    <span class="popup-label">{{__('applications.Truck licence')}}</span>
                    <span class="popup-value">
                        @if ($application->user->truck_licence)
                            <span class="popup-icon-yes">✅</span> {{__('applications.YES')}}
                        @else
                            <span class="popup-icon-no">❌</span> {{__('applications.NO')}}
                        @endif
                    </span>
                </div>

                {{-- Car available --}}
                <div class="popup-row">
                    <span class="popup-label">{{__('applications.Car available')}}</span>
                    <span class="popup-value">
                        @if ($application->user->car_available)
                            <span class="popup-icon-yes">✅</span> {{__('applications.YES')}}
                        @else
                            <span class="popup-icon-no">❌</span> {{__('applications.NO')}}
                        @endif
                    </span>
                </div>

                <h6 class="popup-heading">{{__('applications.Applicants attachment')}}</h6>

                {{-- CV --}}
                <div class="popup-row">
                    <span class="popup-label">{{__('applications.CV')}}</span>
                    <span class="popup-value">
                        @if ($application->user->cv)
                            <span class="popup-icon-yes">✅</span>
                        @else
                            <span class="popup-icon-no">❌</span> {{__('applications.None')}}
                        @endif
                    </span>
                </div>

                @if ($application->user->cv)
                    <iframe src="{{ asset('storage/documents/cv/'.$application->user->cv) }}" class="popup-cv-preview"></iframe>
                @endif

            </div>
        </div>
    @endif
</div>

@push('styles')
    @vite(['resources/css/popupApplication.css'])
@endpush