<nav class="position-relative navbar navbar-light bg-light py-0 px-3 shadow-sm">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <button class="btn p-0 border-0 bg-transparent"
                wire:click="$wire.toggleMenu">
            <img 
                src="{{ asset('storage/images/icons/menu-bar.png') }}" 
                alt="Menu"
                style="width: 42px; height: 42px; object-fit: contain;"
            >
        </button>
        <div class="position-absolute top-100 start-0" 
        wire:show="showMenu">
            <a href="" class="d-block p-2 text-decoration-none">Find a employee</a>
            <a href="" class="d-block p-2 text-decoration-none">Find a helper</a>
        </div>
        
        <a href="/" class="navbar-brand m-0 p-0">
            <img 
                src="{{ asset('storage/images/icons/PageLogo.png') }}" 
                alt="Logo"
                style="height: 85px; object-fit: contain;"
            >
        </a>

        <button class="btn p-0 border-0 bg-transparent"
                wire:click="$wire.toggleProfile">
            <img 
                src="{{ asset('storage/images/icons/home.png') }}" 
                alt="Home"
                style="width: 42px; height: 42px; object-fit: contain;"
            >
        </button>

        <div class="position-absolute top-100 end-0 px-5 py-4"
        style="background-color: #cef1ea; border-bottom-left-radius: 10px;"
        wire:show="showProfile">
            <a href="" class="d-block p-2 text-decoration-none bg-white">Profile & Account</a>
            <a href="" class="d-block p-2 text-decoration-none">My Ads</a>
            <a href="" class="d-block p-2 text-decoration-none">My Bills</a>
            <a href="" class="d-block p-2 text-decoration-none">Logout</a>
        </div>

    </div>
</nav>