<div class="row">

    {{-- Row id --}}
    {!! BootForm::hidden('row_id')->value($data->id ?? null) !!}

    {{-- Configuration: name --}}
    {!! BootForm::text(trans('persona.name'), 'config_name')
        ->addGroupClass('col-md-4')
        ->autofocus()
        ->required()
    !!}

    {{-- Configuration: name --}}
    {!! BootForm::text(trans('base.key'), 'config_key')
        ->addGroupClass('col-md-4')
        ->required(isset($data) ? false : true)
        ->disabled(isset($data) ? false : true)
    !!}

    {{-- Configuration: description --}}
    {!! BootForm::text(trans('base.description'), 'config_description')
        ->addGroupClass('col-md-8')
    !!}
</div>