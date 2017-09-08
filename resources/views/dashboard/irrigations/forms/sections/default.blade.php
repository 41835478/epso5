<div class="row">

    {{-- Row id --}}
    {!! BootForm::hidden('row_id')->value($data->id ?? null) !!}

    {{-- Irrigations: name --}}
    {!! BootForm::text(trans('persona.name'), 'irrigation_name')
        ->addGroupClass('col-md-4')
        ->autofocus()
        ->required()
    !!}

    {{-- Irrigations: description --}}
    {!! BootForm::text(trans('base.description'), 'irrigation_description')
        ->addGroupClass('col-md-8')
    !!}
</div>