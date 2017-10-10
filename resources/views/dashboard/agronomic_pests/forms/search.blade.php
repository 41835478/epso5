{{-- Add client and user if needed... crops, plots,... --}}
@include(component_path('searchByRole'), ['withPlots' => true])

{{-- Search by: Pest --}}
{!! BootForm::text(sections('pests.title'), 'search_pest')
    ->addGroupClass('col-md-2')
!!}

{{-- Add dates --}}
@include(component_path('searchByDate'))