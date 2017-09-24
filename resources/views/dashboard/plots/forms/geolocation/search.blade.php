<div id="search" class="card card-warning">
    <div class="card-block">
        <div class="row">
            {{-- Field: Region --}}
            {!! BootForm::select(trans('persona.region'), 'region_id')
                ->addGroupClass('col-md-3')
                ->options(setOptions(getRegions()) ?? [])
                ->required()
            !!}  

            {{-- Field: City --}}
            {!! BootForm::text(trans('persona.city'), 'city_name')
                ->addGroupClass('col-md-3 has-danger has-success')
                ->addClass('form-control-danger')
                ->disabled()
            !!}  

            {{-- Field: search city button --}}
            <div class="form-group">
                {!! BootForm::button(icon('search', trans('buttons.search')))
                    ->addGroupClass('col-md-3')
                    ->id('searchButton')
                    ->class('btn btn-success btn-search') 
                    ->type('button')
                    ->disabled()
                !!}
            </div>

            {{-- Field: Hidden geolocation values --}}
            @include('dashboard.plots.forms.geolocation.hiddenFields')
        </div>
    </div>
</div>
