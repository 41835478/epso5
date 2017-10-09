{{-- Add client, user and plot... if needed --}}
{{-- @include(component_path('formByRole'), ['withPlot' => true]) --}}

<div class="row">

    {{-- Row id --}}
    {!! BootForm::hidden('row_id')->value($data->id ?? null) !!}
    
    {{-- Field: crop --}}
    {!! BootForm::hidden('crop_id')->id('crop_id')->value(Credentials::isOnlyRole('user') ? getCropId() : null) !!}

    {{-- Field: Application date --}}
    {!!  Form::agronomicDate() !!}

    {{-- Field: Quantity  --}}
    {!! Form::agronomicQuantity() !!}

    {{-- Field: Quantity units --}}
    {!! Form::agronomicUnits($section) !!}

    {{-- Field: observations --}}
    {!! Form::autoTextArea('agronomic_observations') !!}
    
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

    {{-- textarea --}}
    {!! BootForm::textarea(trans('base.observations'), 'edaphology_observations')
        ->addGroupClass('col-md-12')
        ->rows(5)
        ->maxlength(250)
    !!}
    <div class="ml-3" id="textareaAlert-edaphology_observations"></div>

    {{-- Field: Conditional role --}}
    {{-- @Role('admin')
        //
    @else 
        //
    @endRoles --}}
</div>