<div class="row">

    {{-- Row id --}}
    {!! BootForm::hidden('row_id')->value($data->id ?? null) !!}

    {{-- Field: Application name --}}
    {!! BootForm::text(trans('persona.name'), 'administration_app_name')
        ->addGroupClass('col-md-2')
        ->required()
    !!}

    {{-- Field: Application version --}}
    {!! BootForm::text(sections('administrations.version'), 'administration_app_version')
        ->addGroupClass('col-md-2')
        ->required()
    !!}

    {{-- Field: Application url --}}
    {!! BootForm::text(trans('persona.website'), 'administration_app_url')
        ->addGroupClass('col-md-4')
        ->required()
    !!}

    {{-- Field: Application owner nif --}}
    {!! BootForm::text(trans('persona.id.nif'), 'administration_app_owner_nif')
        ->addGroupClass('col-md-2')
        ->required()
    !!}

    {{-- Field: Application owner telephone --}}
    {!! BootForm::text(trans('persona.telephone'), 'administration_app_owner_phone')
        ->addGroupClass('col-md-2')
        ->required()
    !!}
</div>

<div class="row">
    {{-- Field: Application owner address --}}
    {!! BootForm::text(trans('persona.address'), 'administration_app_owner_address')
        ->addGroupClass('col-md-4')
        ->required()
    !!}

    {{-- Field: Application owner city --}}
    {!! BootForm::text(trans('persona.city'), 'administration_app_owner_city')
        ->addGroupClass('col-md-2')
        ->required()
    !!}

    {{-- Field: Application owner region --}}
    {!! BootForm::text(trans('persona.region'), 'administration_app_owner_region')
        ->addGroupClass('col-md-2')
        ->required()
    !!}

    {{-- Field: Application owner state --}}
    {!! BootForm::text(trans('persona.state'), 'administration_app_owner_state')
        ->addGroupClass('col-md-2')
        ->required()
    !!}

    {{-- Field: Application owner country --}}
    {!! BootForm::text(trans('persona.country'), 'administration_app_owner_country')
        ->addGroupClass('col-md-2')
        ->required()
    !!}
</div>

<div class="row">
    {{-- Field: Application owner zip --}}
    {!! BootForm::text(trans('persona.zip'), 'administration_app_owner_zip')
        ->addGroupClass('col-md-2')
        ->required()
    !!}
</div>