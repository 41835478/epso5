<?php 

namespace App\Repositories\ClimaticStations;

//use App\Repositories\_Traits\Date;
//use App\Repositories\ClimaticStations\Traits\ClimaticStationsEvents;
//use App\Repositories\ClimaticStations\Traits\ClimaticStationsPresenters;
use App\Repositories\ClimaticStations\Traits\ClimaticStationsRelationships;
//use App\Repositories\ClimaticStations\Traits\ClimaticStationsScopes;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class ClimaticStation extends Model  {

    use ClimaticStationsRelationships, Notifiable, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'climatic_stations';
    protected $dates = ['deleted_at'];

    /**
     * This model use its own database!!!
     *
     * @var string
     */
    protected $connection = 'mysql_climatic';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'station_reference', 
        'station_reference_by_city',
        'station_name', 
        'station_city_name', 
        'station_region_name', 
        'station_height', 
        'station_lat', 
        'station_lng', 
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    // protected $hidden = ['id'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    // protected $casts = [
    //     'is_god'    => 'boolean',
    // ];
}