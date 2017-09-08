<?php 

namespace App\Repositories\Plots;

//use App\Repositories\Traits\Date;
//use App\Repositories\Plots\Traits\PlotsEvents;
//use App\Repositories\Plots\Traits\PlotsPresenters;
//use App\Repositories\Plots\Traits\PlotsRelationships;
//use App\Repositories\Plots\Traits\PlotsScopes;
//use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Plot extends Model  {

    use Notifiable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'plots';
    //protected $dates = ['deleted_at'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id',
        'crop_id',
        'crop_variety_id',
        'pattern_id',
        'user_id',
        'city_id',
        'region_id',
        'state_id',
        'country_id',
        'climatic_station_id',
        'climatic_station_distance',
        'plot_name',
        'plot_quantity',
        'plot_crop_type',
        'plot_reference',
        'plot_framework_x',
        'plot_framework_y',
        'plot_area',
        'plot_green_cover',
        'plot_start_date',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'plot_green_cover' => 'string',
    // ];
}