<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">

    <meta name="theme-color" content="#563d7c">
</head>

<body>
    <div id="app">
        @include('partials.header')

        <main class="container">
            <div class="row">
                <div class="col-md-8 blog-main">
                    @yield('content')
                </div>
                <aside class="col-md-4 blog-sidebar">
                    <div class="p-4 mb-3 bg-light rounded">
                        <h4 class="font-italic">About</h4>
                        <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero eaque velit
                            quasi unde voluptatem in, modi, totam veniam quo aut saepe ullam ab vero dolorum mollitia
                            culpa! Incidunt, eveniet expedita.</p>
                    </div>
                </aside>
            </div>
        </main>

        {{-- @include('partials.footer') --}}
    </div>
</body>

</html>
