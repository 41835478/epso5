<div class="row">

    {{-- Row id --}}
    {!! BootForm::hidden('row_id')->value($data->id ?? null) !!}

    {{-- Field: Climatic station name --}}
    {!! BootForm::text(trans_title('climatic_stations', 'singular'), 'station_name')
        ->addGroupClass('col-md-4')
        ->autofocus()
        ->required()
    !!}

    {{-- Field: Latitude --}}
    {!! BootForm::text(trans('geolocations.lat'), 'station_lat')
        ->addGroupClass('col-md-2')
        ->addClass('right')
        ->required()
    !!}

    {{-- Field: Longitude --}}
    {!! BootForm::text(trans('geolocations.lng'), 'station_lng')
        ->addGroupClass('col-md-2')
        ->addClass('right')
        ->required()
    !!}

    {{-- Field: Climatic station reference --}}
    {!! BootForm::text(trans('base.reference'), 'station_reference')
        ->addGroupClass('col-md-2')
        ->addClass('right')
        ->required()
    !!}

    {{-- Field: Climatic station reference by city (aemet) --}}
    {!! BootForm::text(sections('climatic_stations.aemet'), 'station_reference_by_city')
        ->addGroupClass('col-md-2')
        ->addClass('right')
    !!}
</div>

<hr>

<div class="row">
    {{-- Field: Climatic station city --}}
    {!! BootForm::text(trans('persona.city'), 'station_city_name')
        ->addGroupClass('col-md-4')
        ->required()
    !!}

    {{-- Field: Climatic station region --}}
    {!! BootForm::text(trans('persona.region'), 'station_region_name')
        ->addGroupClass('col-md-4')
        ->required()
    !!}
</div>