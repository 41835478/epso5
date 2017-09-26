{{-- Data from WMS. Fields with the value for: Latitude, Longitude and height... only for read... --}}
@if(isset($data))
    <div class="col-md-12 separator"></div>
    <div class="row">
        {{-- Field: Catastro --}}
        {!! BootForm::text(trans('geolocations.catastro'), 'geolocation.geo_catastro')
            ->addGroupClass('col-md-2')
            ->addClass('right')
            ->readonly()
        !!}
        {{-- Field: Latitude --}}
        {!! BootForm::text(trans('geolocations.lat'), 'geolocation.geo_lat')
            ->addGroupClass('col-md-2')
            ->addClass('right')
            ->disabled()
        !!}

        {{-- Field: Longitude --}}
        {!! BootForm::text(trans('geolocations.lng'), 'geolocation.geo_lng')
            ->addGroupClass('col-md-2')
            ->addClass('right')
            ->disabled()
        !!}

        {{-- Field: Hight --}}
        {!! BootForm::InputGroup(trans('base.height:min'), 'geolocation.geo_height')
            ->addGroupClass('col-md-2')
            ->addClass('number')
            ->afterAddon('m')
            ->disabled() 
        !!}
    </div>
@endif