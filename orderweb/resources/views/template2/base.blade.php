<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body>
    <div id="container">
        @include('template2/banner')

        <div>
            <aside>
                @include('template2/menu')
            </aside>
            <section>
                <!-- aqui inserta las paginas que
                heredan de este template -->

                @yield('content')
            </section>
            <br>
            @include('template2/footer')
        </div>
    
    </div>
        <script src="{{ asset('js/test.js') }}"></script>
        @yield('scripts')
    </body>
</html>