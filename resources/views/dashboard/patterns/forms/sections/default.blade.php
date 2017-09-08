<div class="row">

    {{-- Row id --}}
    {!! BootForm::hidden('row_id')->value($data->id ?? null) !!}
    {!! BootForm::hidden('crop_id')->value($data->crop_id ?? null) !!}

    {{-- Patterns: name --}}
    {!! BootForm::text(trans('persona.name'), 'pattern_name')
        ->addGroupClass('col-md-4')
        ->autofocus()
        ->required()
    !!}

    {{-- Patterns: description --}}
    {!! BootForm::text(trans('base.description'), 'pattern_description')
        ->addGroupClass('col-md-8')
    !!}
</div>