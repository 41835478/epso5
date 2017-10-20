{{-- Add client, user and plot... if needed --}}
@include(component_path('formByRole'), ['withPlot' => true])

<div class="row">
    {{-- Field: Biocide name --}}
    {!! BootForm::text(sections('biocides.title'), 'biocide.biocide_name')
        ->id('biocide')
        ->addGroupClass('col-md-4')
        ->required()
    !!}
    {!! BootForm::hidden('biocide_id')->id('biocide_id')->required() !!}

    {{-- Field: Biocide company --}}
    {!! BootForm::text(trans('financials.company'), 'biocide.biocide_company')
        ->id('biocide_company')
        ->addGroupClass('col-md-3')
        ->disabled()
    !!}

    {{-- Field: Biocide register --}}
    {!! BootForm::text(trans('base.reference'), 'biocide.biocide_num')
        ->id('biocide_num')
        ->addGroupClass('col-md-2')
        ->addClass('right')
        ->disabled()
    !!}

    {{-- Field: Biocide formula --}}
    {!! BootForm::text(sections('agronomic_biocides.formula'), 'biocide.biocide_formula')
        ->id('biocide_formula')
        ->addGroupClass('col-md-3')
        ->addClass('right')
        ->disabled()
    !!}
</div>

<hr>

<div class="row">
    {{-- Row id --}}
    {!! BootForm::hidden('row_id')->value($data->id ?? null) !!}
    
    {{-- Field: crop --}}
    {!! BootForm::hidden('crop_id')->id('crop_id')->value(Credentials::isOnlyRole('user') ? getCropId() : null) !!}

    {{-- Field: Application date --}}
    {!!  Form::agronomicDate($data ?? null) !!}

    {{-- Field: worker --}}
    {!! BootForm::select(sections('workers.title'), 'worker_id')
        ->addGroupClass('col-md-2')
        ->options(setOptions($workers) ?? [])
    !!}

    {{-- Field: Secure days --}}
    {!! BootForm::InputGroup(sections('agronomic_biocides.secure'), 'agronomic_biocide_secure')
        ->addGroupClass('col-md-2')
        ->addClass('right')
        ->afterAddon(trans('dates.day:plural'))
    !!}

    {{-- Field: Quantity  --}}
    {!! Form::agronomicQuantity($data ?? null) !!}

    {{-- Field: Quantity units --}}
    {!! Form::agronomicUnits($data ?? null, $section ?? null) !!}
</div>

<div class="row">
    {{-- Field: observations --}}
    {!! Form::autoTextArea('agronomic_observations') !!}
</div>