{{-- Add client and user if needed... crops, plots,... --}}
@include(component_path('searchByRole'), ['withCrops' => true, 'withPlots' => true])

{{-- Add dates --}}
@include(component_path('searchByDate'))