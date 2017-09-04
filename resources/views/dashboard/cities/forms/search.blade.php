{{-- Search by: Country --}}
{!! BootForm::text(trans('persona.country'), 'search_country')
    ->addGroupClass('col-md-3')
    ->autofocus()
!!}

{!! BootForm::text(trans('persona.state'), 'search_state')
    ->addGroupClass('col-md-3')
    ->autofocus()
!!}

{!! BootForm::text(trans('persona.region'), 'search_region')
    ->addGroupClass('col-md-3')
    ->autofocus()
!!}

{{-- Search by: City --}}
{!! BootForm::text(trans('persona.city'), 'search_city')
    ->addGroupClass('col-md-3')
!!}