{{-- Add client and user if needed... --}}
@include(component_path('searchByRole'))

{{-- Search by: Machine --}}
{!! BootForm::text(trans_title('machines', 'singular'), 'search_machine')
    ->addGroupClass('col-md-3')
    ->autofocus()
!!}

{{-- Search by: Brand --}}
{!! BootForm::text(sections('machines.brand'), 'search_brand')
    ->addGroupClass('col-md-2')
!!}

{{-- Search by: Model --}}
{!! BootForm::text(sections('machines.model'), 'search_model')
    ->addGroupClass('col-md-2')
!!}