<?php 

namespace App\Repositories\Climatics;

//use App\Repositories\_Traits\Date;
//use App\Repositories\Climatics\Traits\ClimaticsEvents;
//use App\Repositories\Climatics\Traits\ClimaticsPresenters;
//use App\Repositories\Climatics\Traits\ClimaticsRelationships;
//use App\Repositories\Climatics\Traits\ClimaticsScopes;
//use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Climatic extends Model  {

    use Notifiable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'climatics';
    //protected $dates = ['deleted_at'];

    /**
     * This model use its own database!!!
     *
     * @var string
     */
    protected $connection = 'mysql_climatic';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'station_id', 
        'station_ref', 
        'climatic_date', 
        'climatic_precipIntensity', 
        'climatic_temperature', 
        'climatic_temperatureMin', 
        'climatic_temperatureMinHour', 
        'climatic_temperatureMax', 
        'climatic_temperatureMaxHour', 
        'climatic_windSpeed', 
        'climatic_pressure', 
        'climatic_ozone',
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