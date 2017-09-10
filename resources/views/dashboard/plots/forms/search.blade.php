@Role('admin')
    {{-- Search by: Client --}}
    {!! BootForm::text(sections('clients.title'), 'search_client')
        ->addGroupClass('col-md-2')
        ->autofocus()
    !!}

    {{-- Search by: Crops --}}
    {!! BootForm::text(sections('crops.title'), 'search_crop')
        ->addGroupClass('col-md-2')
    !!}
@endRole

@Role('editor')
    {{-- Search by: User --}}
    {!! BootForm::text(sections('users.title'), 'search_user')
        ->addGroupClass('col-md-2')
    !!}
@endRole

{{-- Search by: Plot --}}
{!! BootForm::text(sections('plots.title'), 'search_plot')
    ->addGroupClass('col-md-2')
!!}

{{-- Search by: Variety --}}
{!! BootForm::text(sections('crop_varieties.title'), 'search_variety')
    ->addGroupClass('col-md-2')
!!}

{{-- Search by: City --}}
{!! BootForm::text(sections('cities.title'), 'search_city')
    ->addGroupClass('col-md-2')
!!}