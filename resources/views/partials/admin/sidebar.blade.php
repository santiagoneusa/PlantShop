<div class="p-3 col fixed text-white bg-dark">
    <a href="{{ route('admin.home.index') }}" class="text-white text-decoration-none">
        <h2 class="fs-5 text-center"><b>Admin Panel</b></h2>
    </a>
    <hr />
    <ul class="nav flex-column">
        <li>
            <a href="{{ route('admin.home.index') }}" class="nav-link text-white">Home</a>
        </li>
        <li>
            <a href="{{ route('admin.plant.index') }}" class="nav-link text-white">Manage Plants</a>
        </li>
        <li>
            <a href="{{ route('admin.guide.index') }}" class="nav-link text-white">Manage Guides</a>
        </li>
        <li>
            <div class="mx-auto d-flex justify-content-center mt-4">
                <a href="{{ route('home.index') }}" class="mt-2 btn bg-primary text-white">Go to Store</a>
            </div>
        </li>
    </ul>
</div>