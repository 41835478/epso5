<div class="row">

    {{-- Row id --}}
    {!! BootForm::hidden('row_id')->value($data->id ?? null) !!}

    {{-- Field: Edaphology level --}}
    {!! BootForm::select(trans('base.type'), 'edaphology_level')
        ->addGroupClass('col-md-2')
        ->options(setOptions(sections('edaphologies.sample.type') ?? []))
        ->required()
    !!}

    {{-- Field: Edaphology latitude --}}
    {!! BootForm::text(trans('geolocations.lat'), 'edaphology_lat')
        ->addGroupClass('col-md-2')
        ->addClass('numeric')
        ->required()
    !!}

    {{-- Field: Edaphology longitude --}}
    {!! BootForm::text(trans('geolocations.lng'), 'edaphology_lng')
        ->addGroupClass('col-md-2')
        ->addClass('numeric')
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
</div>

<div class="row">
    {{-- Field: Edaphology longitude --}}
    {!! BootForm::textarea(trans('base.observations'), 'edaphology_observations')
        ->addGroupClass('col-md-12')
        ->rows(5)
        ->maxlength(250)
    !!}
    <div class="ml-3" id="textareaAlert-edaphology_observations"></div>
</div>

{{-- Field: plot id --}}
{!! BootForm::hidden('plot_id')->value($plot->id ?? null) !!}
{{-- Field: crop id --}}
{!! BootForm::hidden('crop_id')->value($plot->crop_id ?? null) !!}
{{-- Field: client id --}}
{!! BootForm::hidden('client_id')->value($plot->client_id ?? null) !!}