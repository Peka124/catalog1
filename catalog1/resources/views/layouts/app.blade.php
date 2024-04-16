<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Catalog App')</title>
    <!-- Include any CSS stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Include any additional stylesheets -->
    @yield('styles')
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="{{ route('home') }}">Catalog App</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('products.index') }}">Products</a>
                </li>
                <!-- Add additional navigation links as needed -->
            </ul>
        </div>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

    <!-- Include any JavaScript libraries -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Include any additional scripts -->
    @yield('scripts')
</body>
</html>
