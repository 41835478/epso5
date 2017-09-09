{{-- Search by: Name --}}
{!! BootForm::text(trans_title('configs', 'singular'), 'search_config')
    ->addGroupClass('col-md-3')
    ->autofocus()
!!}

{{-- Search by: ID --}}
{!! BootForm::text(trans('financials.id'), 'search_id')
    ->addGroupClass('col-md-2')
    ->addClass('number')
!!}