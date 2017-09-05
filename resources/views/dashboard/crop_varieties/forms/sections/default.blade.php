<div class="row">

    {{-- Row id --}}
    {!! BootForm::hidden('row_id')->value($data->id ?? null) !!}

    {{-- Input --}}
    {!! BootForm::text(trans('persona.name'), 'crop_variety_name')
        ->addGroupClass('col-md-4')
        ->autofocus()
        ->required()
    !!}

    {{-- Select --}}
    {!! BootForm::select(trans_title('crops', 'singular'), 'crop_id')
        ->addGroupClass('col-md-2')
        ->options($crops ?? [])
        ->defaultValue('es')
        ->required()
    !!}

    {{-- Addon --}}
    {!! BootForm::InputGroup(trans('base.date'), 'agronomic_date')
        ->addGroupClass('col-lg-2 col-md-6')
        ->addClass('date')
        ->afterAddon(icon('calendar'))
        ->required() 
    !!}

    {{-- Hidden --}}
    {!! BootForm::hidden('myField')->id('myID')->value('myValue') !!}

    {{-- Field: Conditional role --}}
    {{-- @Role('admin')
        //
    @else 
        //
    @endRoles --}}
</div>