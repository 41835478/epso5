{{-- Only show title when: god, admin or editor --}}
@hasAnyRoles(['editor'])
    <legend class="title">@lang('sections/plots.administration')</legend>
@endRoles
<div class="row">
    @Role('admin')
        {{-- Field: Client --}}
        {!! BootForm::select(sections('clients.title'), 'client_id')
            ->addGroupClass('col-md-4')
            ->options($clients)
            ->select(0)
            ->required()
        !!}
        {{-- Field: User --}}
        {!! BootForm::select(sections('users.title'), 'user_id')
            ->addGroupClass('col-md-4')
            ->options([])
        !!}
        {{-- Field: Crop module --}}
        {!! BootForm::hidden('crop_module')->id('crop_module') !!}
        {{-- Field: Crop id --}}
        {!! BootForm::hidden('crop_id')->id('crop_id') !!}
    @elseIfRole('editor')
        {{-- Field: Client --}}
        {!! BootForm::hidden('client_id')->value(getConfig('client', 'id') ?? null) !!}
        {{-- Field: Crop id --}}
        {!! BootForm::hidden('crop_id')->value(getConfig('crop', 'id') ?? null) !!}
        {{-- Field: Crop module --}}
        {!! BootForm::hidden('crop_module')->value(getConfig('crop', 'module') ?? null) !!}
        {{-- Field: User ID --}}
        {!! BootForm::select(sections('users.title'), 'user_id')
            ->addGroupClass('col-md-4')
            ->options($users)
            ->select(0)
        !!}
    @else
        {{-- Field: Client --}}
        {!! BootForm::hidden('client_id')->value(getConfig('client', 'id') ?? null) !!}
        {{-- Field: Crop --}}
        {!! BootForm::hidden('crop_id')->value(getConfig('crop', 'id') ?? null) !!}
        {{-- Field: Crop module --}}
        {!! BootForm::hidden('crop_module')->value(getConfig('crop', 'module') ?? null) !!}
        {{-- Field: User ID --}}
        {!! BootForm::hidden('user_id')->value(Credentials::id() ?? null) !!}
    @endRole
</div>