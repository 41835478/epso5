{!! BootForm::open() !!}
    <div id="search" class="card card-warning">
        <div class="card-block">
            <div class="row">
                {!! BootForm::select(trans('persona.region'), 'region_id')
                    ->addGroupClass('col-md-3')
                    ->options(setOptions(getRegions()) ?? [])
                    ->required()
                !!}  

                {!! BootForm::text(trans('persona.city'), 'city_name')
                    ->addGroupClass('col-md-3 has-danger has-success')
                    ->addClass('form-control-danger')
                    ->disabled()
                !!}  

                <div class="form-group">
                    {!! BootForm::button(icon('search', trans('buttons.search')))
                        ->addGroupClass('col-md-3')
                        ->id('searchButton')
                        ->class('btn btn-success btn-search') 
                        ->type('button')
                        ->disabled()
                    !!}
                </div>

                {!! BootForm::hidden('city_id')
                    ->id('city_id')
                    ->required()
                !!}  

                {!! BootForm::hidden('geo_x')
                    ->id('geo_x')
                    ->required()
                !!}  

                {!! BootForm::hidden('geo_y')
                    ->id('geo_y')
                    ->required()
                !!}  

                {!! BootForm::hidden('geo_lat')
                    ->id('geo_lat')
                    ->required()
                !!}  

                {!! BootForm::hidden('geo_lng')
                    ->id('geo_lng')
                    ->required()
                !!}  

                {!! BootForm::hidden('geo_bbox')
                    ->id('geo_bbox')
                    ->required()
                !!}  

                {!! BootForm::hidden('frame_width')
                    ->id('frame_width')
                    ->required()
                !!}  

                {!! BootForm::hidden('frame_height')
                    ->id('frame_height')
                    ->required()
                !!}  
            </div>
        </div>
    </div>
{!! BootForm::close() !!}