<div class="row">

    {{-- Row id --}}
    {!! BootForm::hidden('row_id')->value($data->id ?? null) !!}

    {{-- Client name --}}
    {!! BootForm::text(trans('sections/clients.title'), 'client_name')
        ->addGroupClass('col-md-4')
        ->required() 
    !!}

    {{-- Client address --}}
    {!! BootForm::text(trans('persona.address'), 'client_address')
        ->addGroupClass('col-md-8')
        ->required() 
    !!}
</div>
<div class="row">
    {{-- Client NIF --}}
    {!! BootForm::text(trans('persona.id.nif'), 'client_nif')
        ->addGroupClass('col-md-2')
        ->required() 
    !!}

    {{-- Client zip --}}
    {!! BootForm::text(trans('persona.zip'), 'client_zip')
        ->addGroupClass('col-md-2')
        ->required() 
    !!}

    {{-- Client contact (person from the company) --}}
    {!! BootForm::text(trans('persona.contact'), 'client_contact')
        ->addGroupClass('col-md-4')
        ->required() 
    !!}

    {{-- Client email --}}
    {!! BootForm::text(trans('persona.email'), 'client_email')
        ->addGroupClass('col-md-4')
        ->required() 
    !!}
</div>
<div class="row">
    {{-- Client city --}}
    {!! BootForm::text(trans('persona.city'), 'client_city')
        ->addGroupClass('col-md-3')
        ->required() 
    !!}

    {{-- Client region --}}
    {!! BootForm::text(trans('persona.region'),  'client_region')
        ->addGroupClass('col-md-3')
        ->required() 
    !!}

    {{-- Client state --}}
    {!! BootForm::text(trans('persona.state'),  'client_state')
        ->addGroupClass('col-md-3')
        ->required() 
    !!}

    {{-- Client country --}}
    {!! BootForm::text(trans('persona.country'), 'client_country')
        ->addGroupClass('col-md-3')
        ->defaultValue(null) 
        ->required()
    !!}
</div>