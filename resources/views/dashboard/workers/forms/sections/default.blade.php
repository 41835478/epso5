<div class="row">

    {{-- Row id --}}
    {!! BootForm::hidden('row_id')->value($data->id ?? null) !!}

    {{-- If the role is user or we are editing... --}}
    @if(isset($data) || Credentials::isOnlyRole('user'))
        {{-- Fields: user --}}
        {!! BootForm::hidden('user_id')->value(Credentials::id() ?? null) !!}
        {{-- Fields: client --}}
        {!! BootForm::hidden('client_id')->value(getClientId()) !!}
    @else 
        {{-- Field: Client and users --}}
        {!! Form::clientsAndUsers($clients ?? null, $users ?? null, $loadModule = false)!!}
    @endif

    {{-- Fields: Worker name --}}
    {!! BootForm::text(trans_title('workers', 'singular'), 'worker_name')
        ->addGroupClass('col-md-4')
        ->autofocus()
        ->required()
    !!}

    {{-- Fields: Worker nif --}}
    {!! BootForm::text(trans('persona.id.nif'), 'worker_nif')
        ->addGroupClass('col-md-2')
    !!}

    {{-- Fields: Worker start date --}}
    {!! BootForm::InputGroup(trans('dates.date:work'), 'worker_start')
        ->addGroupClass('col-md-2')
        ->addClass('date')
        ->afterAddon(icon('calendar'))
    !!}
</div>

<hr>

<div class="row">
    {{-- Fields: Worker ropo number --}}
    {!! BootForm::text(sections('workers.ropo'), 'worker_ropo')
        ->addGroupClass('col-md-2')
    !!}

    {{-- Fields: Worker ropo date --}}
    {!! BootForm::InputGroup(sections('workers.ropo:date'), 'worker_ropo_date')
        ->addGroupClass('col-md-2')
        ->addClass('date')
        ->afterAddon(icon('calendar'))
    !!}

    {{-- Fields: Worker ropo level --}}
    {!! BootForm::select(sections('workers.level'), 'worker_ropo_level')
        ->addGroupClass('col-md-2')
        ->options(setOptions(sections('workers.ropo:level')))
    !!}

    {{-- Fields: Worker observations --}}
    {!! BootForm::textarea(trans('base.description'), 'worker_observations')
        ->addGroupClass('col-md-12')
        ->rows(5)
        ->maxlength(250)
    !!}
    <div class="ml-3" id="textareaAlert-worker_observations"></div>
</div>