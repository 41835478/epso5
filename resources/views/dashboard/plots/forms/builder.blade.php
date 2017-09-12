{{-- Plot Administration --}}
@include(dashboard_path('plots.forms.sections.administration'))

{{-- Plot information --}}
@include(dashboard_path('plots.forms.sections.plot'))

{{-- Crop information --}}
<legend class="title">@lang('sections/plots.crop', ['crop' => getConfig('crop', 'name')])</legend>
@Role('admin')
    {{-- Plot module --}}
    <div id="load-module">Cargando módulo...</div>
@else 
    @include(module_path(getConfig('crop', 'module')))
@endRole