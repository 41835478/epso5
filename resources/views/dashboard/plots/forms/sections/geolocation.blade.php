<legend class="title">@lang('sections/plots.geolocation')</legend>

<div class="row">
    {{-- No need for maps if not edit: change the row width -> 8 or 12 --}}
    <div class="col-md-{!! conditional(isset($data), 8, 12) !!}">
        {{-- Include the sigpac fields --}}
        @include('dashboard.plots.forms.sections.geolocation.sigpac')
        {{-- Include the locations fields --}}
        @include('dashboard.plots.forms.sections.geolocation.locations')
    </div>
    {{-- Load the map --}}
    @if(isset($data))
        <div class="col-md-4">
            {{-- Load the map --}}
            <div id="simpleMap"></div>
        </div>
    @endif
</div>

{{-- Include the WMS fields: lat, lng, height,... --}}
@include('dashboard.plots.forms.sections.geolocation.wms')

{{-- Field: Hidden geolocation values --}}
@if(!isset($data))
    @include('dashboard.plots.forms.sections.maps.hiddenFields')
    {{-- catastro Name --}}
    {!! BootForm::hidden('geo_catastro')->value($catastro['reference'] ?? null) !!}
    {{-- catastro URL --}}
    {!! BootForm::hidden('geo_catastro_url')->value($catastro['url'] ?? null) !!}
    {{-- Region --}}
    {!! BootForm::hidden('region_id')->value(request('region_id') ?? null) !!}
    {{-- City: is inside the hiddenFields include --}}
@endif