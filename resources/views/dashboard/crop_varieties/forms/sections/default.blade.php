<div class="row">

    {{-- Row id --}}
    {!! BootForm::hidden('row_id')->value($data->id ?? null) !!}

    {{-- Variety: name --}}
    {!! BootForm::text(trans('persona.name'), 'crop_variety_name')
        ->addGroupClass('col-md-4')
        ->autofocus()
        ->required()
    !!}

    {{-- Crop: name --}}
    {!! BootForm::select(trans_title('crops', 'singular'), 'crop_id')
        ->addGroupClass('col-md-2')
        ->options($crops ?? [])
        ->defaultValue('es')
        ->required()
    !!}

    {{-- Variety: type --}}
    {!! BootForm::text(sections('crop_varieties.type'), 'crop_variety_type')
        ->addGroupClass('col-md-4')
    !!}
</div>