<!doctype html>
<html lang='en'>

<head>
    <meta charset='utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1' />

    <title>@yield('title', 'Garden of Eden')</title>

    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'crossorigin='anonymous' />
    <link href='{{ asset('/css/app.css') }}' rel='stylesheet' />
</head>


<body>
  
    <div id='container'>
        @include('partials/navbar')

        <header class='masthead bg-primary text-white text-center py-4'>
            <div class='container d-flex align-items-center flex-column'>
                <h2><b><i>@yield('subtitle', 'Garden Of Eden')</i></b></h2>
            </div>
        </header>

        <div id='content' class="p-4">
            @yield('content')
        </div>

    </div>

    <footer>@include('partials/footer')</footer>

    <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js'
        crossorigin='anonymous'></script>

</body>

</html>