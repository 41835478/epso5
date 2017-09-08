<div class="row">

    {{-- Row id --}}
    {!! BootForm::hidden('row_id')->value($data->id ?? null) !!}
    {!! BootForm::hidden('crop_id')->value($data->crop_id ?? (request('crop') ?? null)) !!}

    {{-- Pests: name --}}
    {!! BootForm::text(trans('persona.name'), 'pest_name')
        ->addGroupClass('col-md-4')
        ->autofocus()
        ->required()
    !!}

    {{-- Pests: description --}}
    {!! BootForm::text(trans('base.description'), 'pest_description')
        ->addGroupClass('col-md-8')
    !!}
</div>