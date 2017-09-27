{{-- Edit case --}}
@if(isset($data))
    <legend class="title">@lang('sections/plots.climatic')</legend>

    <div class="row">
        {{-- Field: Climatic station --}}
        {!! BootForm::text(sections('climatic_stations.title:ref'), 'climatic_station.station_name')
            ->addGroupClass('col-md-4')
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
{{-- Configurate case --}}
@else 
    {!! BootForm::hidden('climatic_station_id')
        ->id('climatic_station_id')
        ->value($station->id ?? null)
    !!}  

    {!! BootForm::hidden('climatic_station_distance')
        ->id('climatic_station_distance')
        ->value($station->distance ?? null)
    !!}  
@endif