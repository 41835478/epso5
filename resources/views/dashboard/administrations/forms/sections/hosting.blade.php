<div class="row">
    {{-- Field: Hosting name --}}
    {!! BootForm::text(trans('persona.name'), 'administration_hosting_name')
        ->addGroupClass('col-md-4')
        ->required()
    !!}

    {{-- Field: Hosting address --}}
    {!! BootForm::text(trans('persona.website'), 'administration_hosting_url')
        ->addGroupClass('col-md-4')
        ->required()
    !!}

    {{-- Field: Hosting nif --}}
    {!! BootForm::text(trans('persona.id.nif'), 'administration_hosting_nif')
        ->addGroupClass('col-md-2')
        ->required()
    !!}

    {{-- Field: Hosting telephone --}}
    {!! BootForm::text(trans('persona.telephone'), 'administration_hosting_phone')
        ->addGroupClass('col-md-2')
        ->required()
    !!}
</div>

<div class="row">
    {{-- Field: Hosting address --}}
    {!! BootForm::text(trans('persona.address'), 'administration_hosting_address')
        ->addGroupClass('col-md-4')
        ->required()
    !!}

    {{-- Field: Hosting city --}}
    {!! BootForm::text(trans('persona.city'), 'administration_hosting_city')
        ->addGroupClass('col-md-2')
        ->required()
    !!}

    {{-- Field: Hosting region --}}
    {!! BootForm::text(trans('persona.region'), 'administration_hosting_region')
        ->addGroupClass('col-md-2')
        ->required()
    !!}

    {{-- Field: Hosting state --}}
    {!! BootForm::text(trans('persona.state'), 'administration_hosting_state')
        ->addGroupClass('col-md-2')
        ->required()
    !!}

    {{-- Field: Hosting country --}}
    {!! BootForm::text(trans('persona.country'), 'administration_hosting_country')
        ->addGroupClass('col-md-2')
        ->required()
    !!}
</div>

<div class="row">
    {{-- Field: Hosting conditions --}}
    {!! BootForm::text(sections('administrations.conditions'), 'administration_hosting_conditions_url')
        ->addGroupClass('col-md-4')
        ->required()
    !!}  

    {{-- Field: Hosting register --}}
    {!! BootForm::text(sections('administrations.register'), 'administration_hosting_register')
        ->addGroupClass('col-md-4')
        ->required()
    !!}  
</div>