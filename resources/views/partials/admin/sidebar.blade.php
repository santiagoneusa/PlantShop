<div class="p-3 col fixed text-white bg-dark">
    <a href="{{ route('admin.index') }}" class="text-white text-decoration-none">
        <h2 class="fs-5 text-center"><b>{{ __('admin.admin_panel') }}</b></h2>
    </a>
    <hr />
    <ul class="nav flex-column">
        <li>
            <a href="{{ route('admin.index') }}" class="nav-link text-white">{{ __('admin.home') }}</a>
        </li>
        <li>
            <a href="{{ route('admin.plant.index') }}" class="nav-link text-white">{{ __('admin.manage_plants') }}</a>
        </li>
        <li>
            <a href="{{ route('admin.guide.index') }}" class="nav-link text-white">{{ __('admin.manage_guides') }}</a>
        </li>
        <li>
            <div class="mx-auto d-flex justify-content-center mt-4">
                <a href="{{ route('home.index') }}" class="mt-2 btn bg-primary text-white">{{ __('admin.go_to_store') }}</a>
            </div>
        </li>
    </ul>
</div>