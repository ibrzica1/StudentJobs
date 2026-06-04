<nav class="position-relative navbar navbar-light bg-light py-0 px-3 shadow-sm">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <button class="btn px-3 py-3 border-0 menu-hover"
                wire:click="$wire.toggleMenu">
            <img 
                src="{{ asset('storage/images/icons/menu-bar.png') }}" 
                alt="Menu"
                style="width: 32px; height: 32px; object-fit: contain;"
            >
        </button>
        <div class="position-absolute top-100 start-0 px-3 py-4" 
        style="background-color: #f4bdbd; border-bottom-right-radius: 10px;"
        wire:show="showMenu"
        wire:click.outside="showMenu = false">
            <a href="" class="d-block px-4 py-2 text-decoration-none rounded menu-link">
                Find a employee</a>
            <a href="" class="d-block px-4 py-2 text-decoration-none rounded menu-link">
                Find a helper</a>
        </div>
        
        <a href="/" class="navbar-brand m-0 p-0">
            <img 
                src="{{ asset('storage/images/icons/PageLogo.png') }}" 
                alt="Logo"
                style="height: 85px; object-fit: contain;"
            >
        </a>

        <button class="btn px-3 py-3 border-0 home-hover"
                wire:click="$wire.toggleProfile">
            <img 
                src="{{ asset('storage/images/icons/home.png') }}" 
                alt="Home"
                style="width: 32px; height: 32px; object-fit: contain;"
            >
        </button>

        <div class="position-absolute top-100 end-0 px-3 py-4"
        style="background-color: #c4eccd; border-bottom-left-radius: 10px;"
        wire:show="showProfile"
        wire:click.outside="showProfile = false">
            <a href="" class="d-block p-2 text-decoration-none px-4 py-2 rounded menu-link">
                Profile & Account</a>
            <a href="" class="d-block p-2 text-decoration-none px-4 py-2 rounded menu-link">
                My Ads</a>
            <a href="" class="d-block p-2 text-decoration-none px-4 py-2 rounded menu-link">
                My Bills</a>
            <a href="" class="d-block text-danger p-2 text-decoration-none px-4 py-2 rounded menu-link">
                Logout</a>
        </div>

    </div>
</nav>