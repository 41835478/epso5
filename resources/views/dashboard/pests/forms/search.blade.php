{{-- Search by: crop --}}
{!! BootForm::text(sections('crops.title'), 'search_crop')
    ->addGroupClass('col-md-3')
    ->autofocus()
!!}

{{-- Search by: Name --}}
{!! BootForm::text(sections('pests.title'), 'search_name')
    ->addGroupClass('col-md-3')
    ->autofocus()
!!}

{{-- Search by: ID --}}
{!! BootForm::text(trans('financials.id'), 'search_id')
    ->addGroupClass('col-md-2')
    ->addClass('number')
!!}