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