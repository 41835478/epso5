<legend class="title">@lang('sections/plots.crop')</legend>

{{-- Gods and Admins case --}}
@Role('admin')
{{-- Crop module --}}
    {{-- Edit case --}}
    @if(isset($data))
        @include(module_path($data->crop_module))
    {{-- Create case --}}
    @else
        <div id="load-module">@include(module_path('error'))</div>
    @endif
{{-- Editors and users case --}}
@else 
    @include(module_path(getModule()))
@endRole