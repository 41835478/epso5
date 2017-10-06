@include(component_path('searchByRole'), ['withCrops' => true])

{{-- Search by: Name --}}
{!! BootForm::text(sections('plots.title'), 'search_plot')
    ->addGroupClass('col-md-3')
    ->autofocus()
!!}