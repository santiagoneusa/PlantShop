<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

<nav class="navbar navbar-expand-lg .bg-success-subtle">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('/img/logoWithText.png') }}" alt="Logo" width="95" height="35"
                class="d-inline-block align-text-top">
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <a class="nav-link active" href="{{ route('home.index') }}">Home</a>
                <a class="nav-link" href="{{ route('plant.create') }}">Create plant</a>
                <a class="nav-link" href="{{ route('plant.index') }}">Plants</a>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">Categorías</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Interior</a></li>
                        <li><a class="dropdown-item" href="#">Exterior</a></li>
                        <li><a class="dropdown-item" href="#">Ornamentales</a></li>
                        <li><a class="dropdown-item" href="#">Aromáticas</a></li>
                    </ul>
                </li>
                <a class="nav-link" href="{{ route('plant.index') }}">Guides</a>
            </ul>

            @guest
            <div class="d-flex align-items-center">
                <a class="nav-link active me-3" href="{{ route('login') }}">Login</a>
                <a class="nav-link active me-3" href="{{ route('register') }}">Register</a>
            </div>
            @else
            <div class="d-flex align-items-center">
                <span class="material-symbols-outlined">shopping_cart</span>
                
                <div class="dropdown-center">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="material-symbols-outlined" style="margin-top: 3px;">account_circle</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li class="dropdown-item">
                            <form id="logout" action="{{ route('logout') }}" method="POST">
                                <a role="button" class="nav-link active"
                                onclick="document.getElementById('logout').submit();">Logout</a>
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            @endguest

            <form class="d-flex m-1" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>