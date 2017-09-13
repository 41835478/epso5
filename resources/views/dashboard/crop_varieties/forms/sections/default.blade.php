<div class="row">

    {{-- Row id --}}
    {!! BootForm::hidden('row_id')->value($data->id ?? null) !!}

    {{-- Crop: id & name --}}
    {!! BootForm::hidden('crop_id')->value($crop->id ?? null) !!}
    {!! BootForm::text(sections('crops.title'), 'crop_name_not_valid')
        ->value($crop->crop_name)
        ->addGroupClass('col-md-3')
        ->disabled()
    !!}

    {{-- Variety: name --}}
    {!! BootForm::text(trans('persona.name'), 'crop_variety_name')
        ->addGroupClass('col-md-4')
        ->autofocus()
        ->required()
    !!}

    {{-- Variety: type --}}
    @if($crop->crop_type > 0)
        {!! BootForm::select(sections('crop_varieties.type'), 'crop_variety_type')
            ->addGroupClass('col-md-2')
            ->options($types)
            ->required()
        !!}
    @endif
</div>