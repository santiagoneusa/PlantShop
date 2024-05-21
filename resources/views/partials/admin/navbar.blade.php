<nav class="p-2 shadow d-flex justify-content-end align-items-center">
    <h6 class="mt-2">{{ __('admin.admin') }}</h6>
    <span class="material-symbols-outlined ms-2">account_circle</span>
    
    <div class="d-flex align-items-center">
        <div class="dropdown-center">
            <button class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown"
                aria-expanded="false">{{ __('admin.language') }}</button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <a class="dropdown-item" href="{{ route('locale', ['locale' => 'en']) }}">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/88/United-states_flag_icon_round.svg/1024px-United-states_flag_icon_round.svg.png"
                            alt="English" class="language-flag" style="width: 50px; height: 50px;"> {{ __('admin.english') }}
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('locale', ['locale' => 'es']) }}">
                        <img src="https://st.depositphotos.com/34641548/60941/v/450/depositphotos_609415818-stock-illustration-national-flag-world-spain.jpg"
                            alt="Spanish" class="language-flag" style="width: 50px; height: 50px;"> {{ __('admin.spanish') }}
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
