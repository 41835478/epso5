<div class="row">

    {{-- Row id --}}
    {!! BootForm::hidden('row_id')->value($data->id ?? null) !!}

    {{-- Field: name --}}
    {!! BootForm::text(sections('plots.title'), 'plot_name')
        ->addGroupClass('col-md-3')
        ->autofocus()
        ->required()
    !!}

    {{-- Field: area --}}
    {!! BootForm::InputGroup(trans('units.area'), 'plot_area')
        ->addGroupClass('col-lg-2 col-md-6')
        ->addClass('number')
        ->afterAddon('m2')
        ->required() 
    !!}

    {{-- Field: date --}}
    {!! BootForm::InputGroup(trans('dates.date'), 'plot_start_date')
        ->addGroupClass('col-lg-2 col-md-6')
        ->addClass('date')
        ->afterAddon(icon('date'))
    !!}
</div>