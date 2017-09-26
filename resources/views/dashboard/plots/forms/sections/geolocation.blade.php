<legend class="title">@lang('sections/plots.geolocation')</legend>

<div class="row">
    {{-- No need for maps if not edit: change the row width -> 8 or 12 --}}
    <div class="col-md-{!! conditional(isset($data), 8, 12) !!}">
        {{-- Alert: SIGPAC message --}}
        <div class="col-md-12 alert alert-success" role="alert">
            {!! icon('alert', sections('plots.geolocation:alert')) !!}
        </div>
        <div class="row">
            {{-- Field: SIGPAC Region --}}
            {!! BootForm::text(trans('geolocations.region:alt'), 'geo_sigpac_region')
                ->addClass('right')
                ->addGroupClass('col-md-2')
                ->value($sigpac['region'] ?? ($data->geolocation->geo_sigpac_region ?? null))
            !!}

            {{-- Field: SIGPAC City --}}
            {!! BootForm::text(trans('geolocations.city'), 'geo_sigpac_city')
                ->addClass('right')
                ->addGroupClass('col-md-2')
                ->value($sigpac['city'] ?? ($data->geolocation->geo_sigpac_city ?? null))
            !!}
            
            {{-- Field: SIGPAC Aggregate --}}
            {!! BootForm::text(trans('geolocations.aggregate'), 'geo_sigpac_aggregate')
                ->addClass('right')
                ->addGroupClass('col-md-2')
                ->value($sigpac['aggregate'] ?? ($data->geolocation->geo_sigpac_aggregate ?? null))
            !!}

            {{-- Field: SIGPAC Zone --}}
            {!! BootForm::text(trans('geolocations.zone'), 'geo_sigpac_zone')
                ->addClass('right')
                ->addGroupClass('col-md-2')
                ->value($sigpac['zone'] ?? ($data->geolocation->geo_sigpac_zone ?? null))
            !!}
        
            {{-- Field: SIGPAC Plot --}}
            {!! BootForm::text(trans('geolocations.plot'), 'geo_sigpac_plot')
                ->addClass('right')
                ->addGroupClass('col-md-2')
                ->value($sigpac['plot'] ?? ($data->geolocation->geo_sigpac_plot ?? null))
            !!}

            {{-- Field: SIGPAC Precinct --}}
            {!! BootForm::text(trans('geolocations.precinct'), 'geo_sigpac_precinct')
                ->addClass('right')
                ->addGroupClass('col-md-2')
                ->value($data->geolocation->geo_sigpac_precinct ?? null)
            !!}
        </div>

        {{-- This values are only for edit, and only for read!!! --}}
        @if(isset($data))
            <div class="separator"></div>
            {{-- Localization values --}}
            <div class="row">
                {{-- Field: State --}}
                {!! BootForm::text(trans('geolocations.state:min'), 'geolocation.state_name')
                    ->addGroupClass('col-md-3')
                    ->value($data->state->state_name ?? null)
                    ->disabled()
                !!}

                {{-- Field: Region --}}
                {!! BootForm::text(trans('geolocations.region'), 'geolocation.region_name')
                    ->addGroupClass('col-md-3')
                    ->value($data->region->region_name ?? null)
                    ->disabled()
                !!}
            
                {{-- Field: City --}}
                {!! BootForm::text(trans('geolocations.city'), 'geolocation.city_name')
                    ->addGroupClass('col-md-3')
                    ->value($data->city->city_name ?? null)
                    ->disabled()
                !!}

                {{-- Field: Zip --}}
                {!! BootForm::text(trans('geolocations.zip'), 'geolocation.geo_zip')
                    ->addGroupClass('col-md-3')
                    ->addClass('right')
                    ->disabled()
                !!}
            </div>
        @endif
    </div>

    {{-- Load the map --}}
    @if(isset($data))
        <div class="col-md-4">
            {{-- Load the map --}}
            <div id="simpleMap"></div>
        </div>
    @endif

</div>

{{-- Fields with the value for: Latitude, Longitude and height... only for read... --}}
@if(isset($data))
    <div class="col-md-12 separator"></div>
    <div class="row">
        {{-- Field: Catastro --}}
        {!! BootForm::text(trans('geolocations.catastro'), 'geolocation.geo_catastro')
            ->addGroupClass('col-md-2')
            ->addClass('right')
            ->readonly()
        !!}
        {{-- Field: Latitude --}}
        {!! BootForm::text(trans('geolocations.lat'), 'geolocation.geo_lat')
            ->addGroupClass('col-md-2')
            ->addClass('right')
            ->disabled()
        !!}

        {{-- Field: Longitude --}}
        {!! BootForm::text(trans('geolocations.lng'), 'geolocation.geo_lng')
            ->addGroupClass('col-md-2')
            ->addClass('right')
            ->disabled()
        !!}

        {{-- Field: Hight --}}
        {!! BootForm::InputGroup(trans('base.height:min'), 'geolocation.geo_height')
            ->addGroupClass('col-md-2')
            ->addClass('number')
            ->afterAddon('m')
            ->disabled() 
        !!}
    </div>
@endif

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