<div class="row">

    {{-- Row id --}}
    {!! BootForm::hidden('row_id')->value($data->id ?? null) !!}

    {{-- Trainings: name --}}
    {!! BootForm::text(trans('persona.name'), 'training_name')
        ->addGroupClass('col-md-4')
        ->autofocus()
        ->required()
    !!}

    {{-- Trainings: description --}}
    {!! BootForm::text(trans('base.description'), 'training_description')
        ->addGroupClass('col-md-8')
    !!}
</div>