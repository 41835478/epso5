{!! BootForm::hidden('state_id')
    ->id('state_id')
    ->value(request('state_id') ?? getState(request('city_id')))
    ->required()
!!}  

{!! BootForm::hidden('city_id')
    ->id('city_id')
    ->value(request('city_id') ?? null)
    ->required()
!!}  

{!! BootForm::hidden('geo_x')
    ->id('geo_x')
    ->value(request('geo_x') ?? null)
    ->required()
!!}  

{!! BootForm::hidden('geo_y')
    ->id('geo_y')
    ->value(request('geo_y') ?? null)
    ->required()
!!}  

{!! BootForm::hidden('geo_lat')
    ->id('geo_lat')
    ->value(request('geo_lat') ?? null)
    ->required()
!!}  

{!! BootForm::hidden('geo_lng')
    ->id('geo_lng')
    ->value(request('geo_lng') ?? null)
    ->required()
!!}  

{!! BootForm::hidden('geo_bbox')
    ->id('geo_bbox')
    ->value(request('geo_bbox') ?? null)
    ->required()
!!}  

{!! BootForm::hidden('frame_width')
    ->id('frame_width')
    ->value(request('frame_width') ?? null)
    ->required()
!!}  

{!! BootForm::hidden('frame_height')
    ->id('frame_height')
    ->value(request('frame_height') ?? null)
    ->required()
!!}  