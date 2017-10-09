@Role('admin')
    {{-- Search by: User --}}
    {!! BootForm::text(sections('clients.title'), 'search_client')
        ->addGroupClass('col-md-2')
    !!}

    {{-- Search by: Crops --}}
    @if(!empty($withCrops))
        {!! BootForm::text(sections('crops.title'), 'search_crop')
            ->addGroupClass('col-md-2')
        !!}
    @endif
@endRole

@Role('editor')
    {{-- Search by: User --}}
    {!! BootForm::text(sections('users.title'), 'search_user')
        ->addGroupClass('col-md-2')
    !!}
@endRole

{{-- Search by: Plots --}}
@if(!empty($withPlots))
    {!! BootForm::text(sections('plots.title'), 'search_plot')
        ->addGroupClass(Credentials::isAdmin() ? 'col-md-2' : 'col-md-3')
        ->autofocus()
    !!}
@endif