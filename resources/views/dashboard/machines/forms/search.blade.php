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

{{-- Search by: Machine --}}
{!! BootForm::text(trans_title('machines', 'singular'), 'search_machine')
    ->addGroupClass('col-md-3')
    ->autofocus()
!!}

{{-- Search by: Brand --}}
{!! BootForm::text(sections('machines.brand'), 'search_brand')
    ->addGroupClass('col-md-2')
!!}

{{-- Search by: Model --}}
{!! BootForm::text(sections('machines.model'), 'search_model')
    ->addGroupClass('col-md-2')
!!}