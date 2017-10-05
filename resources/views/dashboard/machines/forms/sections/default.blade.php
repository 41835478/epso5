<div class="row">

    {{-- Row id --}}
    {!! BootForm::hidden('row_id')->value($data->id ?? null) !!}

    {{-- Field: Equipment name --}}
    {!! BootForm::text(sections('machines.title'), 'machine_equipment_name')
        ->addGroupClass('col-md-4')
        ->autofocus()
        ->required()
    !!}

    {{-- Field: Machine brand --}}
    {!! BootForm::text(sections('machines.brand'), 'machine_brand')
        ->addGroupClass('col-md-3')
    !!}

    {{-- Field: Machine model --}}
    {!! BootForm::text(sections('machines.model'), 'machine_model')
        ->addGroupClass('col-md-3')
    !!}

    {{-- Field: Machine date --}}
    {!! BootForm::InputGroup(trans('dates.date:buy'), 'machine_date')
        ->addGroupClass('col-md-2')
        ->addClass('date')
        ->afterAddon(icon('calendar'))
        ->required() 
    !!}

    {{-- textarea --}}
    {!! BootForm::textarea(trans('base.observations'), 'machine_observations')
        ->addGroupClass('col-md-12')
        ->rows(5)
        ->maxlength(250)
    !!}
    <div class="ml-3" id="textareaAlert-machine_observations"></div>
</div>