<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

<nav class="navbar navbar-expand-lg .bg-success-subtle">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('/img/logoWithText.png') }}" alt="Logo" width="95" height="35"
                class="d-inline-block align-text-top">
        </a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <a class="nav-link active" href="{{ route('home.index') }}">{{ __('app.home') }}</a>
                <a class="nav-link" href="{{ route('plant.index') }}">{{ __('app.plants') }}</a>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{ __('app.categories') }}</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('category.show', 1) }}">{{ __('app.ornamental') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('category.show', 2) }}">{{ __('app.indoor') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('category.show', 3) }}">{{ __('app.outdoor') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('category.show', 4) }}">{{ __('app.aromatic') }}</a></li>
                    </ul>
                </li>   
                <a class="nav-link" href="{{ route('guide.index') }}">{{ __('app.guides') }}</a>
                <a class="nav-link" href="{{ route('books.index') }}">{{ __('app.books') }}</a>
                <a class="nav-link" href="{{ route('product.index') }}">{{ __('app.allied_store') }}</a>
            </ul>

            @guest
            <div class="d-flex align-items-center">
                <a class="nav-link active me-3" href="{{ route('login') }}">{{ __('auth.login') }}</a>
                <a class="nav-link active me-3" href="{{ route('register') }}">{{ __('auth.register') }}</a>
            </div>
            @else
            <div class="d-flex align-items-center">
                <a href="{{ route('cart.index') }}" class="mt-1 color-black" style="color: black;"><span class="material-symbols-outlined">shopping_cart</span></a>            
                <div class="dropdown-center">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="material-symbols-outlined" style="margin-top: 3px;">account_circle</span>
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('user.index') }}">{{ __('auth.profile') }}</a></li>
                        <li><a class="dropdown-item" href="{{ route('admin.index') }}">{{ __('admin.admin_panel') }}</a></li>
                        <li class="dropdown-item">
                            <form id="logout" action="{{ route('logout') }}" method="POST">
                                <a role="button" class="nav-link active"
                                onclick="document.getElementById('logout').submit();">{{ __('auth.logout') }}</a>
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
            @endguest

            <form action="{{ route('plant.search') }}" method="GET" class="d-flex m-1" role="search">
                <input class="form-control me-2" type="text" name="search" placeholder="{{ __('app.search') }}" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">{{ __('app.button_search') }}</button>
            </form>
            
            <div class="d-flex align-items-center">
                <div class="dropdown-center">
                    <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">{{ __('admin.language') }}</button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="{{ route('locale', ['locale' => 'en']) }}">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/88/United-states_flag_icon_round.svg/1024px-United-states_flag_icon_round.svg.png" alt="English" class="language-flag"> {{ __('admin.english') }}
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('locale', ['locale' => 'es']) }}">
                                <img src="https://st.depositphotos.com/34641548/60941/v/450/depositphotos_609415818-stock-illustration-national-flag-world-spain.jpg" alt="Spanish" class="language-flag"> {{ __('admin.spanish') }}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>


        </div>
    </div>
</nav>