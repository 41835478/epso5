<html lang="es">
    <head>
        @include('components.headers')
    </head>

    <body>
        {{-- Application container --}}
        <div id="@yield('application', 'app')">

            {{-- Main container --}}
            <div id="app-content" class="container-fluid">

                {{-- Application content --}}
                @yield('content')

            {{-- Main container --}}
            </div>
        
        {{-- Application container --}}
        </div>

        {{-- Footer --}}
        @include('components.footer')

    </body>
</html>