<div class="row">

    {{-- Field: Aggregate stability --}}
    {!! BootForm::InputGroup(trans('base.date'), 'agronomic_date')
        ->addGroupClass('col-md-2')
        ->addClass('date')
        ->afterAddon(icon('calendar'))
        ->required() 
    !!}

</div>