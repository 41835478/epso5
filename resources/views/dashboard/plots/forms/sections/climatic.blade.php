<legend class="title">@lang('sections/plots.climatic')</legend>

<div class="row">
    {{-- Field: Climatic station --}}
    {!! BootForm::text(sections('climatic_stations.title:ref'), 'climatic_station.station_name')
        ->addGroupClass('col-md-4')
        ->addClass('right')
        ->disabled()
    !!}

    {{-- Field: Climatic distance --}}
    {!! BootForm::InputGroup(trans('geolocations.distance'), 'climatic_station_distance')
        ->addGroupClass('col-md-2')
        ->addClass('number')
        ->afterAddon('m')
        ->disabled() 
    !!}
</div>