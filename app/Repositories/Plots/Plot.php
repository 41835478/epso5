<?php 

namespace App\Repositories\Plots;

use App\Repositories\Plots\Traits\PlotsPresenters;
use App\Repositories\Plots\Traits\PlotsRelationships;
use App\Repositories\_Traits\Date;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Plot extends Model  {

    use Date, Notifiable, PlotsPresenters, PlotsRelationships, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'plots';
    protected $dates = ['deleted_at'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id',
        'crop_id',
        'crop_module',
        'crop_variety_id',
        'crop_variety_type',
        'crop_quantity',
        'crop_training',
        'pattern_id',
        'user_id',
        'city_id',
        'region_id',
        'state_id',
        'country_id',
        'climatic_station_id',
        'climatic_station_distance',
        'plot_name',
        'plot_reference',
        'plot_framework',
        'plot_area',
        'plot_real_area',
        'plot_percent_cultivated_land',
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