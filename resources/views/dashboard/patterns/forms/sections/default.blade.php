<div class="row">

    {{-- Row id --}}
    {!! BootForm::hidden('row_id')->value($data->id ?? null) !!}
    {!! BootForm::hidden('crop_id')->value($data->crop_id ?? (Request::get('crop') ?? null)) !!}

    {{-- Patterns: name --}}
    {!! BootForm::text(trans('persona.name'), 'pattern_name')
        ->addGroupClass('col-md-4')
        ->autofocus()
        ->required()
    !!}

    {{-- Patterns: reference --}}
    {!! BootForm::text(trans('base.reference'), 'pattern_reference')
        ->addGroupClass('col-md-4')
    !!}
</div>