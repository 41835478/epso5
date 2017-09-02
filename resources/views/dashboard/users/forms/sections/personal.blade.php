<div class="row">
    {{-- Row id --}}
    {!! BootForm::hidden('row_id')->value($data->id ?? null) !!}

    {{-- Field: Name --}}
    {!! BootForm::text(trans('persona.name'), 'name')
        ->addGroupClass('col-md-4')
        ->autofocus()
        ->required()
    !!}

    {{-- Field: Email --}}
    {!! BootForm::text(trans('persona.email'), 'email')
        ->addGroupClass('col-md-4')
        ->required()
    !!}

    {{-- Field: Locale --}}
    {!! BootForm::select(trans('persona.locale'), 'locale')
        ->addGroupClass('col-md-2')
        ->options(select('locale'))
        ->defaultValue('es')
        ->required()
    !!}

    {{-- Field: Role --}}
    @Role('admin')
        {{-- Admin can edit the role --}}
        {!! BootForm::select(trans('persona.role'), 'role')
            ->addGroupClass('col-md-2')
            ->options(select('roles'))
            ->defaultValue(Credentials::userRole($data ?? null))
            ->required()
        !!}
    @else 
        {{-- You can't edit the client --}}
        {!! BootForm::hidden('role')->id('role')->value(Credentials::userRole($data ?? null)) !!}
    @endRoles
</div>

<hr>

<div class="row">
{{-- Field: Clients --}}
    @Role('admin')
        {{-- Admin can edit the client --}}
        {!! BootForm::select(trans('financials.client'), 'client_id')
            ->addGroupClass('col-md-3')
            ->options($clients)
            ->required()
        !!}
    @else 
        {{-- You can't edit the client --}}
        {!! BootForm::hidden('client_id')->id('client_id')->value(Credentials::client()) !!}
    @endRoles

    {{-- Field: Password --}}
    {!! BootForm::password(trans('auth.password'), 'password')
        ->addGroupClass('col-md-4')
        ->required(empty($data) ? true : false)
    !!}

    {{-- Field: Password confirm --}}
    {!! BootForm::password(trans('auth.password:confirmation'), 'password_confirmation')
        ->addGroupClass('col-md-4')
        ->required(empty($data) ? true : false)
    !!}
    
    {{-- Message only for edit form --}}
    @if(isset($data))
        <div class="form-group col-md-8">
            <div class="form-control bg-warning">@lang('auth.password:update')</div>
        </div>
    @endif
</div>