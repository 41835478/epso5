<div class="row">
    {!! BootForm::open()->action(route('dashboard.' . $role . '.' . $section . '.store'))->post()->enctype('multipart/form-data') !!}
        {{-- Crop: id --}}
        {!! BootForm::hidden('crop_id')->value($data->id ?? null) !!}

        {{-- Crop: name --}}
        {!! BootForm::text(trans_title('crops', 'singular'), 'crop_name')
            ->addGroupClass('col-md-4')
            ->disabled()
        !!}

        {{-- Crop: Variety --}}
        {!! BootForm::text(trans_title('crop_variety_types', 'singular'), 'crop_variety_type_name')
            ->addGroupClass('col-md-4')
            ->autofocus()
            ->required()
        !!}

        {{-- Crop: Variety code --}}
        {!! BootForm::text(trans('base.code'), 'crop_variety_type_code')
            ->addGroupClass('col-md-4')
            ->required()
        !!}
    {!! BootForm::close() !!}
</div>