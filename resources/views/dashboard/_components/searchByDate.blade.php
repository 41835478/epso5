{{-- Field: Start date --}}
{!! BootForm::InputGroup(trans('dates.date:start'), 'search_dateStart')
    ->addGroupClass('col-md-2')
    ->addClass('date advancedSearch')
    ->afterAddon(icon('calendar'))
    ->readonly()
!!}

{{-- Field: End date --}}
{!! BootForm::InputGroup(trans('dates.date:end'), 'search_dateEnd')
    ->addGroupClass('col-md-2')
    ->addClass('date advancedSearch')
    ->afterAddon(icon('calendar'))
    ->readonly()
!!}