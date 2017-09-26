{{-- This values are only for edit, and only for read!!! --}}
@if(isset($data))
    <div class="separator"></div>
    {{-- Localization values --}}
    <div class="row">
        {{-- Field: State --}}
        {!! BootForm::text(trans('geolocations.state:min'), 'geolocation.state_name')
            ->addGroupClass('col-md-3')
            ->value($data->state->state_name ?? null)
            ->disabled()
        !!}

        {{-- Field: Region --}}
        {!! BootForm::text(trans('geolocations.region'), 'geolocation.region_name')
            ->addGroupClass('col-md-3')
            ->value($data->region->region_name ?? null)
            ->disabled()
        !!}
    
        {{-- Field: City --}}
        {!! BootForm::text(trans('geolocations.city'), 'geolocation.city_name')
            ->addGroupClass('col-md-3')
            ->value($data->city->city_name ?? null)
            ->disabled()
        !!}
    </div>
@endif