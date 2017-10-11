{{-- Crop module --}}

    {{-- Edit case --}}
    @if(isset($data))
        @include(module_path($data->crop_module))
    {{-- Create case --}}
    @else
        {{-- Admin and Gods --}}
        @Role('admin')
            <div id="load-module">@include(module_path('error'))</div>
        {{-- Editors and users --}}
        @else 
            @include(module_path(getModule()))
        @endRole        
    @endif