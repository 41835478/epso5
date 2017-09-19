<div class="row">

    {{-- Row id --}}
    {!! BootForm::hidden('row_id')->value($data->id ?? null) !!}

    {{-- City: name --}}
    {!! BootForm::text(trans('persona.city'), 'city_name')
        ->addGroupClass('col-md-6')
        ->autofocus()
        ->required()
    !!}

    {{-- City: INE --}}
    {!! BootForm::text(trans('base.ine'), 'ine_id')
        ->addGroupClass('col-md-2')
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