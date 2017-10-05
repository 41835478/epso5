@Role('admin')
    {{-- Search by: User --}}
    {!! BootForm::text(sections('clients.title'), 'search_client')
        ->addGroupClass('col-md-2')
    !!}
@endRole

@Role('editor')
    {{-- Search by: User --}}
    {!! BootForm::text(sections('users.title'), 'search_user')
        ->addGroupClass('col-md-2')
    !!}
@endRole

{{-- Search by: Worker --}}
{!! BootForm::text(sections('workers.title'), 'search_worker')
    ->addGroupClass('col-md-2')
    ->autofocus()
!!}

{{-- Search by: NIF --}}
{!! BootForm::text(trans('persona.id.nif'), 'search_nif')
    ->addGroupClass('col-md-2')
!!}

{{-- Search by: Nº ROPO --}}
{!! BootForm::text(sections('workers.ropo'), 'search_ropo')
    ->addGroupClass('col-md-2')
!!}

{{-- Search by: Level ROPO --}}
{!! BootForm::select(sections('workers.level'), 'search_level')
    ->addGroupClass('col-md-2')
    ->options(setOptions(sections('workers.ropo:level')))
!!}