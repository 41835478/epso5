<div class="row">
    {{-- Row id --}}
    {!! BootForm::hidden('row_id')->value($data->id ?? null) !!}

    {{-- Biocides: Register number --}}
    {!! BootForm::text(sections('biocides.register'), 'biocide_num')
        ->addGroupClass('col-md-2')
        ->autofocus()
        ->required()
    !!}

    {{-- Biocides: Name --}}
    {!! BootForm::text(trans_title('biocides', 'singular'), 'biocide_name')
        ->addGroupClass('col-md-5')
        ->autofocus()
        ->required()
    !!}

    {{-- Biocides: Company --}}
    {!! BootForm::text(trans('financials.company'), 'biocide_company')
        ->addGroupClass('col-md-5')
        ->autofocus()
        ->required()
    !!}
</div>
<div class="row">
    {{-- Biocides: Formula --}}
    {!! BootForm::text(sections('biocides.formula'), 'biocide_formula')
        ->addGroupClass('col-md-12')
        ->autofocus()
        ->required()
    !!}
</div>