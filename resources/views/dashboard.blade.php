<html lang="es">
    <head>
        @include(component_path('headers'))
    </head>

    <body>
        {{-- Application container --}}
        <div id="@yield('application', 'app')">

            {{-- Navigation bar --}}
            @includeWhen(auth()->check(), component_path('navbar'))

            {{-- Main container --}}
            <div id="app-content" class="container-fluid">
                
                {{-- Alert/Error messages. Only if logged --}}
                @includeWhen(auth()->check(), component_path('alerts'))

                {{-- Application content --}}
                @yield('content')

            {{-- Main container --}}
            </div>
        
        {{-- Application container --}}
        </div>

        {{-- Footer --}}
        @include(component_path('footer'))
        
        {{-- Modals --}}
        @include(modal_path('error'))
        @yield('modals')
    </body>
</html>