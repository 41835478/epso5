{{-- Search by: Register --}}
{!! BootForm::text(sections('biocides.register'), 'search_register')
    ->addGroupClass('col-md-2')
!!}

{{-- Search by: Biocide --}}
{!! BootForm::text(trans_title('biocides', 'singular'), 'search_biocide')
    ->addGroupClass('col-md-3')
    ->autofocus()
!!}

{{-- Search by: Company --}}
{!! BootForm::text(trans('financials.company'), 'search_company')
    ->addGroupClass('col-md-3')
!!}