<legend class="title">@lang('sections/plots.geolocation')</legend>

<div class="row">
    <div class="col-md-8">
        {{-- Alert: SIGPAC message --}}
        <div class="col-md-12 alert alert-success" role="alert">
            {!! icon('alert', sections('plots.geolocation:alert')) !!}
        </div>
        <div class="row">
            {{-- Field: SIGPAC Region --}}
            {!! BootForm::text(trans('geolocations.region:alt'), 'geolocation.geo_sigpac_region')
                ->addClass('right')
                ->addGroupClass('col-md-2')
                ->value($sigpac['region'] ?? null)
            !!}

            {{-- Field: SIGPAC City --}}
            {!! BootForm::text(trans('geolocations.city'), 'geolocation.geo_sigpac_city')
                ->addClass('right')
                ->addGroupClass('col-md-2')
                ->value($sigpac['city'] ?? null)
            !!}
            
            {{-- Field: SIGPAC Aggregate --}}
            {!! BootForm::text(trans('geolocations.aggregate'), 'geolocation.geo_sigpac_aggregate')
                ->addClass('right')
                ->addGroupClass('col-md-2')
                ->value($sigpac['aggregate'] ?? null)
            !!}

            {{-- Field: SIGPAC Zone --}}
            {!! BootForm::text(trans('geolocations.zone'), 'geolocation.geo_sigpac_zone')
                ->addClass('right')
                ->addGroupClass('col-md-2')
                ->value($sigpac['zone'] ?? null)
            !!}
        
            {{-- Field: SIGPAC Plot --}}
            {!! BootForm::text(trans('geolocations.plot'), 'geolocation.geo_sigpac_plot')
                ->addClass('right')
                ->addGroupClass('col-md-2')
                ->value($sigpac['plot'] ?? null)
            !!}

            {{-- Field: SIGPAC Precinct --}}
            {!! BootForm::text(trans('geolocations.precinct'), 'geolocation.geo_sigpac_precinct')
                ->addClass('right')
                ->addGroupClass('col-md-2')
            !!}
        </div>

        {{-- This values are only for edit, and only for read!!! --}}
        @if(isset($data))
            <div class="separator"></div>
            {{-- Localization values --}}
            <div class="row">
                {{-- Field: State --}}
                {!! BootForm::text(trans('geolocations.state:min'), 'notForStored_name')
                    ->addGroupClass('col-md-3')
                    ->value($data->state->state_name ?? null)
                    ->disabled()
                !!}

                {{-- Field: Region --}}
                {!! BootForm::text(trans('geolocations.region'), 'notForStored_name')
                    ->addGroupClass('col-md-3')
                    ->value($data->region->region_name ?? null)
                    ->disabled()
                !!}
            
                {{-- Field: City --}}
                {!! BootForm::text(trans('geolocations.city'), 'notForStored_name')
                    ->addGroupClass('col-md-3')
                    ->value($data->city->city_name ?? null)
                    ->disabled()
                !!}

                {{-- Field: Zip --}}
                {!! BootForm::text(trans('geolocations.zip'), 'notForStored_zip')
                    ->addGroupClass('col-md-3')
                    ->value($data->geolocation->geo_zip ?? null)
                    ->disabled()
                !!}
            </div>
        @endif
    </div>

    {{-- Load the map --}}
    <div class="col-md-4">
        {{-- Load the map --}}
        <div id="simpleMap"></div>
    </div>

</div>

{{-- Fields with the value for: Latitude, Longitude and height... only for read... --}}
@if(isset($data))
    <div class="col-md-12 separator"></div>
    <div class="row">
        {{-- Field: Catastro --}}
        {!! BootForm::text(trans('geolocations.catastro'), 'notForStored_catastro')
            ->addGroupClass('col-md-2')
            ->addClass('right')
            ->value($data->geolocation->geo_catastro ?? null)
            ->readonly()
        !!}
        {{-- Field: Latitude --}}
        {!! BootForm::text(trans('geolocations.lat'), 'notForStored_lat')
            ->addGroupClass('col-md-2')
            ->addClass('right')
            ->value($data->geolocation->geo_lat ?? null)
            ->disabled()
        !!}

        {{-- Field: Longitude --}}
        {!! BootForm::text(trans('geolocations.lng'), 'notForStored_lng')
            ->addGroupClass('col-md-2')
            ->addClass('right')
            ->value($data->geolocation->geo_lng ?? null)
            ->disabled()
        !!}

        {{-- Field: Hight --}}
        {!! BootForm::InputGroup(trans('base.height:min'), 'notForStored_height')
            ->addGroupClass('col-md-2')
            ->addClass('number')
            ->value($data->geolocation->geo_height ?? null)
            ->afterAddon('m')
            ->disabled() 
        !!}
    </div>
@endif

{{-- Field: Hidden geolocation values --}}
@include('dashboard.plots.forms.maps.hiddenFields')
{{-- catastro Name --}}
{!! BootForm::hidden('geolocation.geo_catastro')->value($catastro['reference'] ?? null) !!}
{{-- catastro URL --}}
{!! BootForm::hidden('geolocation.geo_catastro_url')->value($catastro['url'] ?? null) !!}
{{-- Region --}}
{!! BootForm::hidden('region_id')->value(request('region_id') ?? null) !!}
{{-- City: is inside the hiddenFields include --}}