<div class="row">
    {{-- Row id --}}
    {!! BootForm::hidden('row_id')->value($data->id ?? null) !!}

    {{-- Field: plot id --}}
    {!! BootForm::hidden('plot_id')->value(Route::input('id') ?? null) !!}

    {{-- Field: crop id --}}
    {!! BootForm::hidden('crop_id') !!}

    {{-- Field: client id --}}
    {!! BootForm::hidden('client_id') !!}

    {{-- Field: Client --}}
    {!! BootForm::select(sections('clients.title'), 'client_name')
        ->addGroupClass('col-md-4')
        ->options(setOptions($clients ?? []))
        ->required()
    !!}
</div>
<div class="row">
    {{-- Field: Edaphology level --}}
    {!! BootForm::select(trans('base.type'), 'edaphology_level')
        ->addGroupClass('col-md-2')
        ->options(setOptions(sections('edaphologies.sample.type') ?? []))
        ->required()
    !!}

    {{-- Field: Edaphology reference --}}
    {!! BootForm::text(trans('base.reference'), 'edaphology_reference')
        ->addGroupClass('col-md-2')
    !!}

    {{-- Field: Edaphology name --}}
    {!! BootForm::text(sections('edaphologies.sample.name'), 'edaphology_name')
        ->addGroupClass('col-md-4')
    !!}

    {{-- Field: Edaphology latitude --}}
    {!! BootForm::text(trans('geolocations.lat'), 'edaphology_lat')
        ->addGroupClass('col-md-2')
        ->addClass('number')
        ->required()
    !!}

    {{-- Field: Edaphology longitude --}}
    {!! BootForm::text(trans('geolocations.lng'), 'edaphology_lng')
        ->addGroupClass('col-md-2')
        ->addClass('number')
        ->required()
    !!}
</div>