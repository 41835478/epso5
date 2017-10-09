<div class="row">

    {{-- Row id --}}
    {!! BootForm::hidden('row_id')->value($data->id ?? null) !!}
    
    {{-- Field: crop --}}
    {!! BootForm::hidden('crop_id')->id('crop_id')->value(Credentials::isOnlyRole('user') ? getCropId() : null) !!}

    {{-- Field: Application date --}}
    {!!  Form::agronomicDate(trans('dates.date:detection')) !!}

    {{-- Field: Pest --}}
    {!! BootForm::select(trans_title('pests'), 'pest_id')
        ->addGroupClass('col-md-2')
        ->options($pests)
        ->required()
    !!}

    {{-- Field: observations --}}
    {!! Form::autoTextArea('agronomic_observations') !!}

</div>