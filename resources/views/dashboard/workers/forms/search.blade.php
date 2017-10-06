@include(component_path('searchByRole'))

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