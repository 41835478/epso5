{{-- Add client and user if needed... crops, plots,... --}}
@include(component_path('searchByRole'), ['withCrops' => true, 'withPlots' => true])

{{-- Search: type --}}
{!! BootForm::select(sections('agronomic_culturals.title'), 'search_cultural')
    ->addGroupClass('col-md-2')
    ->options(select('culturals') ?? [])
!!}

{{-- Add dates --}}
@include(component_path('searchByDate'))