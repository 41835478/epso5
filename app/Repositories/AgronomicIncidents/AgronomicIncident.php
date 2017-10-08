<?php 

namespace App\Repositories\AgronomicIncidents;

use App\Repositories\_Traits\Date;
//use App\Repositories\AgronomicIncidents\Traits\AgronomicIncidentsEvents;
use App\Repositories\AgronomicIncidents\Traits\AgronomicIncidentsPresenters;
use App\Repositories\AgronomicIncidents\Traits\AgronomicIncidentsRelationships;
//use App\Repositories\AgronomicIncidents\Traits\AgronomicIncidentsScopes;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class AgronomicIncident extends Model  {

    use AgronomicIncidentsPresenters, AgronomicIncidentsRelationships, Date, Notifiable, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'agronomic_incidents';
    protected $dates = ['deleted_at'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'client_id',
        'plot_id',
        'crop_id',
        'agronomic_date',
        'agronomic_observations',
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