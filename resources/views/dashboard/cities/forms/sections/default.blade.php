<div class="row">

    {{-- Row id --}}
    {!! BootForm::hidden('row_id')->value($data->id ?? null) !!}

    {{-- City: name --}}
    {!! BootForm::text(trans('persona.city'), 'city_name')
        ->addGroupClass('col-md-5')
        ->autofocus()
        ->required()
    !!}

    {{-- City: Latitude --}}
    {!! BootForm::text(trans('base.latitude'), 'city_lat')
        ->addGroupClass('col-md-3')
        ->required()
    !!}

    {{-- City: Longitude --}}
    {!! BootForm::text(trans('base.longitude'), 'city_lng')
        ->addGroupClass('col-md-3')
        ->required()
    !!}
</div>