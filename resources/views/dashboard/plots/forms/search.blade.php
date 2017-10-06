@include(component_path('searchByRole'), ['withCrops' => true])

{{-- Search by: Plot --}}
{!! BootForm::text(sections('plots.title'), 'search_plot')
    ->addGroupClass('col-md-2')
!!}

{{-- Search by: Variety --}}
{!! BootForm::text(sections('crop_varieties.title'), 'search_variety')
    ->addGroupClass('col-md-2')
!!}

{{-- Search by: City --}}
{!! BootForm::text(sections('cities.title'), 'search_city')
    ->addGroupClass('col-md-2')
!!}