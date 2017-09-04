<div class="row">

    {{-- Row id --}}
    {!! BootForm::hidden('row_id')->value($data->id ?? null) !!}

    {{-- City: name --}}
    {!! BootForm::text(trans('persona.city'), 'city_name')
        ->addGroupClass('col-md-4')
        ->autofocus()
        ->required()
    !!}

    {{-- City: Latitude --}}
    {!! BootForm::text(trans('base.latitude'), 'city_lat')
        ->addGroupClass('col-md-2')
        ->required()
    !!}

    {{-- City: Longitude --}}
    {!! BootForm::text(trans('base.longitude'), 'city_lng')
        ->addGroupClass('col-md-2')
        ->required()
    !!}
</div>

<hr> 

<div class="row">
    {{-- City: State name --}}
    {!! BootForm::text(trans('persona.state'), 'state.state_name')
        ->addGroupClass('col-md-4')
        ->disabled()
    !!}

    {{-- City: Regions name --}}
    {!! BootForm::text(trans('persona.region'), 'region.region_name')
        ->addGroupClass('col-md-4')
        ->disabled()
    !!}
</div>