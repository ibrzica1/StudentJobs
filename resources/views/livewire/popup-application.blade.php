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

<style>
.popup-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1050;
    padding: 20px;
}

.popup-content {
    background-color: #fff;
    border-radius: 16px;
    padding: 32px;
    max-width: 520px;
    width: 100%;
    max-height: 85vh;
    overflow-y: auto;
    position: relative;
    box-shadow: 0 10px 40px rgba(0,0,0,0.2);
}

.popup-close {
    position: absolute;
    top: 14px;
    right: 16px;
    background: none;
    border: none;
    font-size: 26px;
    line-height: 1;
    color: #adb5bd;
    cursor: pointer;
    transition: color 0.15s ease;
}

.popup-close:hover {
    color: #212529;
}

.popup-section {
    background-color: #f8f9fa;
    border-radius: 10px;
    padding: 16px;
    margin-bottom: 20px;
    font-size: 14px;
    color: #495057;
}

.popup-heading {
    text-transform: uppercase;
    font-size: 12px;
    font-weight: 700;
    letter-spacing: 0.5px;
    color: #adb5bd;
    margin: 24px 0 12px 0;
    padding-bottom: 8px;
    border-bottom: 1px solid #e9ecef;
}

.popup-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 0;
    border-bottom: 1px solid #f1f3f5;
    font-size: 14px;
}

.popup-row:last-of-type {
    border-bottom: none;
}

.popup-label {
    color: #6c757d;
    font-weight: 500;
}

.popup-value {
    color: #212529;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 6px;
}

.popup-icon-yes {
    font-size: 14px;
}

.popup-icon-no {
    font-size: 14px;
    opacity: 0.5;
}

.popup-cv-preview {
    width: 100%;
    height: 300px;
    border: 1px solid #e9ecef;
    border-radius: 8px;
    margin-top: 12px;
}

/* Scrollbar styling za popup-content */
.popup-content::-webkit-scrollbar {
    width: 6px;
}

.popup-content::-webkit-scrollbar-thumb {
    background-color: #dee2e6;
    border-radius: 10px;
}
.popup-avatar-wrapper {
    text-align: center;
}

.popup-avatar {
    display: block;
    margin: 0 auto;
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}
</style>