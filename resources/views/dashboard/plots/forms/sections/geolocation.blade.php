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
            !!}

            {{-- Field: SIGPAC City --}}
            {!! BootForm::text(trans('geolocations.city'), 'geolocation.geo_sigpac_city')
                ->addClass('right')
                ->addGroupClass('col-md-2')
            !!}
            
            {{-- Field: SIGPAC Aggregate --}}
            {!! BootForm::text(trans('geolocations.aggregate'), 'geolocation.geo_sigpac_aggregate')
                ->addClass('right')
                ->addGroupClass('col-md-2')
            !!}

            {{-- Field: SIGPAC Zone --}}
            {!! BootForm::text(trans('geolocations.zone'), 'geolocation.geo_sigpac_zone')
                ->addClass('right')
                ->addGroupClass('col-md-2')
            !!}
        
            {{-- Field: SIGPAC Plot --}}
            {!! BootForm::text(trans('geolocations.plot'), 'geolocation.geo_sigpac_plot')
                ->addClass('right')
                ->addGroupClass('col-md-2')
            !!}

            {{-- Field: SIGPAC Precinct --}}
            {!! BootForm::text(trans('geolocations.precinct'), 'geolocation.geo_sigpac_precinct')
                ->addClass('right')
                ->addGroupClass('col-md-2')
            !!}
        </div>

        @if(isset($data))
            <div class="separator"></div>
            {{-- Localization values --}}
            <div class="row">
                {{-- Field: State --}}
                {!! BootForm::text(trans('geolocations.state:min'), 'state.state_name')
                    ->addGroupClass('col-md-3')
                    ->disabled()
                !!}

                {{-- Field: Region --}}
                {!! BootForm::text(trans('geolocations.region'), 'region.region_name')
                    ->addGroupClass('col-md-3')
                    ->disabled()
                !!}
            
                {{-- Field: City --}}
                {!! BootForm::text(trans('geolocations.city'), 'city.city_name')
                    ->addGroupClass('col-md-3')
                    ->disabled()
                !!}

                {{-- Field: Zip --}}
                {!! BootForm::text(trans('geolocations.zip'), 'geolocation.zip')
                    ->addGroupClass('col-md-3')
                    ->disabled()
                !!}
            </div>
        @endif
    </div>
    <div class="col-md-4">
        {{-- Load the map --}}
        <div id="simpleMap"></div>
    </div>
</div>

{{-- Fields with the value for: Latitude, Longitude and height --}}
@if(isset($data))
    <div class="col-md-12 separator"></div>
    <div class="row">
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
        {!! BootForm::InputGroup(trans('base.height:min'), 'geolocations.geo_height')
            ->addGroupClass('col-md-2')
            ->addClass('number')
            ->afterAddon('m')
            ->disabled() 
        !!}
    </div>
@endif

{{-- Field: Hidden geolocation values --}}
@include('dashboard.plots.forms.maps.hiddenFields')

{{-- Region --}}
{!! BootForm::hidden('region_id')->value(request('region_id') ?? null) !!}
{{-- City --}}
{!! BootForm::hidden('city_id')->value(request('city_id') ?? null) !!}