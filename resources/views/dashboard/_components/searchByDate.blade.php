{{-- Field: Start date --}}
{!! BootForm::InputGroup(trans('dates.date:start'), 'start_date')
    ->addGroupClass('col-md-2')
    ->addClass('date advancedSearch')
    ->afterAddon(icon('calendar'))
    ->readonly()
!!}

{{-- Field: End date --}}
{!! BootForm::InputGroup(trans('dates.date:end'), 'end_date')
    ->addGroupClass('col-md-2')
    ->addClass('date advancedSearch')
    ->afterAddon(icon('calendar'))
    ->readonly()
!!}