@extends("layout")

@section("pageTitle")
    Profile
@endsection

@section("content")
<div class="bg-light">


<div class="container py-5">

    <div class="row g-4">

        {{-- PROFILE CARD --}}
        <div class="col-lg-4">

            <div class="card shadow-sm border-0">

            <div class="card-body justify-content-center text-center p-4">

                @include('profile.partials.profile-card')

            </div>
        </div>

        {{-- EDIT PROFILE --}}
        <div class="col-lg-8">

            <div class="card shadow-sm border-0">

                <div class="card-body p-4">
                    @if($errors->any())
                        <div class="alert alert-danger">{{$errors->first()}}</div>
                    @endif

                    {{-- PERSONAL DETAILS --}}
                    @include('profile.partials.personal-details-form')

                    {{-- ADDRESS --}}
                    @include('profile.partials.address-form')
                    
                    {{-- CHANGE AVATAR --}}
                    @include('profile.partials.change-avatar-form') 
                    
                    {{-- CV --}}
                    @include('profile.partials.CV-form') 

                    @if ($user->role === 'employer')
                        
                        @if ($companies !== null)
                            
                            @foreach ($companies as $company)
                                
                                {{-- CHANGE COMPANY LOGO --}}
                                @include('profile.partials.change-company-logo-form') 

                                {{-- COMPANY INFO --}}
                                @include('profile.partials.company-info-form') 

                                {{-- COMPANY DELETE --}}
                                @include('profile.partials.delete-company-form') 

                            @endforeach

                        @endif
                        
                        <livewire:profile-livewire />

                    @endif

                    @if ($user->role === 'student')

                        <livewire:mobility/>

                        {{-- EDUCATION --}}
                        @include('profile.partials.education-form') 
                        
                    @endif
                </div>

            </div>

        </div>

    </div>

</div>

</div>

@endsection