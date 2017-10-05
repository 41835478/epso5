<div class="row">
    {{-- Field: Machine date --}}
    {!! BootForm::InputGroup(sections('machines.inspection:last'), 'machine_inspection')
        ->addGroupClass('col-md-2')
        ->addClass('date')
        ->afterAddon(icon('calendar'))
        ->required() 
    !!}

    {{-- Field: next inspection --}}
    {!! BootForm::select(sections('machines.inspection:next'), 'machine_next_inspection')
        ->addGroupClass('col-md-3')
        ->options(select('inspection', $firstOptionEmpty = true))
        ->required()
    !!}

    {{-- Field: Machine date --}}
    {!! BootForm::InputGroup(sections('machines.inspection:next'), 'machine_next_inspection_info')
        ->addGroupClass('col-md-2')
        ->addClass('date')
        ->afterAddon(icon('calendar'))
        ->value(next_inspection($data->machine_inspection ?? null, $data->machine_next_inspection ?? null))
        ->disabled() 
    !!}
</div>