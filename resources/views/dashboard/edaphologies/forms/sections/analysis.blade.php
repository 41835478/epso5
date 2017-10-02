<div class="row">

    {{-- Row id --}}
    {!! BootForm::hidden('row_id')->value($data->id ?? null) !!}

    {{-- Field: Edaphology level --}}
    {!! BootForm::select(trans('base.type'), 'edaphology_level')
        ->addGroupClass('col-md-2')
        ->options(setOptions(sections('edaphologies.sample.type')) ?? [])
        ->required()
    !!}

    {{-- Field: Edaphology name --}}
    {!! BootForm::text(sections('edaphologies.sample.name'), 'edaphology_name')
        ->addGroupClass('col-md-4')
    !!}

    {{-- Field: Edaphology reference --}}
    {!! BootForm::text(trans('base.reference'), 'edaphology_reference')
        ->addGroupClass('col-md-2')
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

    {{-- Select --}}
    {!! BootForm::select(trans('persona.locale'), 'locale')
        ->addGroupClass('col-md-2')
        ->options(select('locale') ?? [])
        ->defaultValue('es')
        ->required()
    !!}

    {{-- Addon --}}
    {!! BootForm::InputGroup(trans('base.date'), 'agronomic_date')
        ->addGroupClass('col-md-2')
        ->addClass('date')
        ->afterAddon(icon('calendar'))
        ->required() 
    !!}

    {{-- Field: Conditional role --}}
    {{-- @Role('admin')
        //
    @else 
        //
    @endRoles --}}
</div>