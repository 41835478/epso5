{{-- Add client and user if needed... --}}
@include(component_path('searchByRole'), ['withCrops' => true, 'withPlots' => true])

{{-- Add dates --}}
@include(component_path('searchByDate'))