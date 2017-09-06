<div class="row">

    {{-- Row id --}}
    {!! BootForm::hidden('row_id')->value($data->id ?? null) !!}

    {{-- Crop name --}}
    {!! BootForm::text(trans_title('crops', 'singular'), 'crop_name')
        ->addGroupClass('col-md-4')
        ->autofocus()
        ->required()
    !!}

    {{-- Crop description --}}
    {!! BootForm::text(trans('base.description'), 'crop_description')
        ->addGroupClass('col-md-8')
        ->required()
    !!}

    {{-- Crop module --}}
    {!! BootForm::text(trans('base.module'), 'crop_module')
        ->addGroupClass('col-md-4')
        ->maxlength(20)
        ->required()
    !!}

    {{-- Crop types: For example -> red or white --}}
    {!! BootForm::select(trans_title('crop_variety_types'), 'crop_type')
        ->addGroupClass('col-md-3')
        ->options(select('boolean', $firstFieldEmpty = false))
        ->defaultValue(0)
        ->helpBlock(sections('crop_variety_types.activate'))
        ->required()
    !!}
</div>