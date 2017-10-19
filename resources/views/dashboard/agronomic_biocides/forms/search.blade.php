{{-- Add client and user if needed... crops, plots,... --}}
@include(component_path('searchByRole'), ['withCrops' => true, 'withPlots' => true])

{{-- Search by: Biocide --}}
{!! BootForm::text(trans_title('agronomic_biocides', 'singular'), 'search_biocide')
    ->addGroupClass('col-md-2')
    ->autofocus()
!!}

{{-- Add dates --}}
@include(component_path('searchByDate'))