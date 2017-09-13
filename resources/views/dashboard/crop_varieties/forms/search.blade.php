{{-- Search by: Variety --}}
{!! BootForm::text(sections('crop_varieties.title'), 'search_variety')
    ->addGroupClass('col-md-3')
    ->autofocus()
!!}

{{-- Search by: Type --}}
{!! BootForm::text(sections('crop_variety_types.title'), 'search_type')
    ->addGroupClass('col-md-3')
!!}