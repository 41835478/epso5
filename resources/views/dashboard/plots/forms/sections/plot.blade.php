<legend class="title">@lang('sections/plots.plot')</legend>

<div class="row">
    {{-- Row id --}}
    {!! BootForm::hidden('row_id')->value($data->id ?? null) !!}

    {{-- Field: name --}}
    {!! BootForm::text(sections('plots.title'), 'plot_name')
        ->addGroupClass('col-md-4')
        ->autofocus()
        ->required()
    !!}

    {{-- Field: Framework --}}
    {!! BootForm::InputGroup(sections('plots.framework'), 'plot_framework')
        ->addGroupClass('col-md-2')
        ->addClass('framework')
        ->afterAddon('m')
        ->required() 
    !!}

    {{-- Field: area --}}
    {!! BootForm::InputGroup(trans('units.area'), 'plot_area')
        ->addGroupClass('col-md-2')
        ->addClass('number')
        ->afterAddon('m2')
        ->required() 
    !!}

    {{-- Field: % crop in the land --}}
    {!! BootForm::InputGroup(trans('units.percent:alt'), 'plot_percent_cultivated_land')
        ->addGroupClass('col-md-2')
        ->addClass('number')
        ->defaultValue(100)
        ->min(0)
        ->max(100)
        ->afterAddon(icon('percent'))
    !!}

    {{-- Field: cultivated area --}}
    {!! BootForm::InputGroup(trans('units.area:alt'), 'plot_real_area')
        ->addGroupClass('col-md-2')
        ->addClass('number')
        ->afterAddon('m2')
        ->readonly() 
    !!}

    {{-- Field: date --}}
    {!! BootForm::InputGroup(sections('crops.date:min'), 'plot_start_date')
        ->addGroupClass('col-md-2')
        ->addClass('date')
        ->afterAddon(icon('date'))
    !!}
</div>