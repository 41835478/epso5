{{-- Search by: Name --}}
{!! BootForm::text(trans_title('climatic_stations', 'singular'), 'search_name')
    ->addGroupClass('col-md-3')
    ->autofocus()
!!}

{{-- Search by: Email --}}
{!! BootForm::text(trans('base.reference'), 'search_reference')
    ->addGroupClass('col-md-3')
!!}

{{-- Search by: ID --}}
{!! BootForm::text(sections('climatic_stations.aemet'), 'search_aemet')
    ->addGroupClass('col-md-2')
!!}