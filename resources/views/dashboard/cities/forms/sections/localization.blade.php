<div class="row">
    {!! BootForm::select(trans('persona.country'), 'country_id')
        ->addGroupClass('col-md-2')
        ->options($countries)
        ->required()
    !!}

    {!! BootForm::select(trans('persona.state'), 'state_id')
        ->addGroupClass('col-md-3')
        ->options($states)
        ->required()
    !!}

    {!! BootForm::select(trans('persona.region'), 'region_id')
        ->addGroupClass('col-md-3')
        ->disabled()
    !!}
</div>