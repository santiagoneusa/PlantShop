<!-- Made by: Santiago Neusa Ruiz -->

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <title>@yield('title', 'Admin - Garden of Eden')</title>

    <link href="{{ asset('/css/admin.css') }}" rel="stylesheet" />
</head>

<body>

    <div id='container' class="row g-0">
        @include('partials.admin.sidebar')
        <div id="content" class="col content-grey">
            @include('partials.admin.navbar')
            <div class="g-0 m-4">
                @yield('content')
            </div>
        </div>
    </div>
    @include('partials.admin.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>
</html>