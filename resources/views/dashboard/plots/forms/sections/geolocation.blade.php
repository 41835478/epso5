<legend class="title">@lang('sections/plots.geolocation')</legend>

<div class="row">
    <div class="col-md-8">
        <div class="col-md-12 alert alert-danger" role="alert">
            {!! icon('alert', sections('plots.geolocation:alert')) !!}
        </div>
        <div class="row">
            {{-- Field: SIGPAC Region --}}
            {!! BootForm::text(trans('geolocations.region:alt'), 'geolocation.geo_sigpac_region')
                ->addGroupClass('col-md-2')
            !!}

            {{-- Field: SIGPAC City --}}
            {!! BootForm::text(trans('geolocations.city'), 'geolocation.geo_sigpac_city')
                ->addGroupClass('col-md-2')
            !!}
            
            {{-- Field: SIGPAC Aggregate --}}
            {!! BootForm::text(trans('geolocations.aggregate'), 'geolocation.geo_sigpac_aggregate')
                ->addGroupClass('col-md-2')
            !!}

            {{-- Field: SIGPAC Zone --}}
            {!! BootForm::text(trans('geolocations.zone'), 'geolocation.geo_sigpac_zone')
                ->addGroupClass('col-md-2')
            !!}
        
            {{-- Field: SIGPAC Plot --}}
            {!! BootForm::text(trans('geolocations.plot'), 'geolocation.geo_sigpac_plot')
                ->addGroupClass('col-md-2')
            !!}

            {{-- Field: SIGPAC Precinct --}}
            {!! BootForm::text(trans('geolocations.precinct'), 'geolocation.geo_sigpac_precinct')
                ->addGroupClass('col-md-2')
            !!}
        </div>
    </div>
    <div class="col-md-4">
        IMAGEN
    </div>
</div>