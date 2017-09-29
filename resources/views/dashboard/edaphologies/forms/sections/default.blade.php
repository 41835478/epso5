<div class="row">

    {{-- Row id --}}
    {!! BootForm::hidden('row_id')->value($data->id ?? null) !!}

    {{-- Input --}}
    {!! BootForm::text(trans('persona.name'), 'name')
        ->addGroupClass('col-md-4')
        ->autofocus()
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