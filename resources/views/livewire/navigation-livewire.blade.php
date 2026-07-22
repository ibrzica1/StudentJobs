<?php 
use App\Models\Job;
?>

<nav class="relative bg-white shadow-sm py-0 px-3">
    <div class="flex justify-between items-center w-full">
        
        <button class="p-3 border-0 transition-colors hover:bg-[#f4bdbd] rounded"
                wire:click="$wire.toggleMenu">
            <img src="{{ asset('storage/images/icons/menu-bar.png') }}" 
                 alt="Menu"
                 class="w-8 h-8 object-contain">
        </button>

        <div class="absolute top-full left-0 bg-white rounded-br-[10px] z-50 shadow" 
             wire:show="showMenu"
             wire:click.outside="showMenu = false"
             style="width:300px">
                <div class="py-4 px-5 bg-[#f4bdbd] fw-bold">For employers</div>
                <a href="{{route('job.categories',['jobType' => 'employee'])}}" 
                class="block px-4 py-2 hover:bg-gray-200 rounded 
                transition-colors text-gray-800 my-2 text-secondary">
                Post a helper job</a>
                <a href="{{route('job.categories',['jobType' => 'helper'])}}" 
                class="block px-4 py-2 hover:bg-gray-200 rounded 
                transition-colors text-gray-800 my-2 text-secondary"
                >Post a internship job</a>
                <div class="py-4 px-5 bg-[#f4bdbd] fw-bold">For students</div>
                <a href="{{route('job.categories',['jobType' => 'employee'])}}" 
                class="block px-4 py-2 hover:bg-gray-200 rounded 
                transition-colors text-gray-800 my-2 text-secondary"
                style="">
                Find helper job</a>
                <a href="{{route('job.categories',['jobType' => 'helper'])}}" 
                class="block px-4 py-2 hover:bg-gray-200 rounded 
                transition-colors text-gray-800 my-2 text-secondary">
                Find internship job</a>
                <div class="py-4 px-5 bg-[#f4bdbd] fw-bold">Categories</div>
                @foreach (Job::ALLOWED_HELPER_TYPES as $category)
                <a href="{{route('homepage.category',['category' => $category])}}" 
                class="block px-4 py-2 hover:bg-gray-200 rounded 
                transition-colors text-gray-800 my-2 text-secondary">
                {{$category}}</a>   
                @endforeach
        </div>
        
        <a href="/" class="p-0 m-0">
            <img src="{{ asset('storage/images/icons/PageLogo.png') }}" 
                 alt="Logo"
                 class="h-[85px] object-contain">
        </a>

        <!-- Profile Button -->
        <button class="p-3 border-0 transition-colors hover:bg-[#c4eccd] rounded"
                wire:click="$wire.toggleProfile">
            <img src="{{ asset('storage/images/icons/home.png') }}" 
                 alt="Home"
                 class="w-8 h-8 object-contain">
        </button>

        <!-- Profile Dropdown -->
        <div class="absolute top-full right-0 px-3 py-4 bg-white rounded-bl-[10px] z-50 shadow"
             wire:show="showProfile"
             wire:click.outside="showProfile = false"
             style="width:300px">
             @if ($user)
                @if ($user->role === 'employer' || $user->role === 'admin')
                    <a href="{{route('profile.edit')}}" class="block p-2 px-4 hover:bg-gray-200 rounded transition-colors text-gray-800">Profile & Account</a>
                    <a href="#" class="block p-2 px-4 hover:bg-gray-200 rounded transition-colors text-gray-800">My Ads</a>
                    <a href="#" class="block p-2 px-4 hover:bg-gray-200 rounded transition-colors text-gray-800">My Bills</a>
                    <form action="{{ route('logout') }}" method="POST" class="">
                        @csrf
                        <button href="{{route('logout')}}" class="block text-start p-2 px-4 hover:bg-gray-200 rounded 
                        w-100 transition-colors text-red-600">
                            Logout</button>
                    </form>
                @elseif ($user->role === 'student')
                    <a href="{{route('profile.edit')}}" class="block p-2 px-4 hover:bg-gray-200 rounded transition-colors text-gray-800">Profile & Account</a>
                    <a href="#" class="block p-2 px-4 hover:bg-gray-200 rounded transition-colors text-gray-800">My Applications</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button href="{{route('logout')}}" class="block p-2 px-4 hover:bg-gray-200 rounded transition-colors text-red-600">
                            Logout</button>
                    </form>
                @endif
             @else
                <a href="{{route('login')}}" class="block p-2 px-4 hover:bg-gray-200 rounded transition-colors text-gray-800">Login</a>
                <a href="{{route('register')}}" class="block p-2 px-4 hover:bg-gray-200 rounded transition-colors text-gray-800">Register</a>
             @endif
            
            
        </div>
    </div>
</nav>