{{-- Add client and user if needed... crops, plots,... --}}
@include(component_path('searchByRole'), ['withCrops' => true, 'withPlots' => true])

{{-- Search by: Name --}}
{!! BootForm::text(trans('persona.name'), 'search_name')
    ->addGroupClass('col-md-3')
    ->autofocus()
!!}

{{-- Search by: Email --}}
{!! BootForm::text(trans('persona.email'), 'search_email')
    ->addGroupClass('col-md-3')
!!}

{{-- Search by: ID --}}
{!! BootForm::text(trans('financials.id'), 'search_id')
    ->addGroupClass('col-md-2')
    ->addClass('number')
!!}

{{-- Add dates --}}
@include(component_path('searchByDate'))