<?php 

namespace App\Repositories\Edaphologies;

//use App\Repositories\_Traits\Date;
//use App\Repositories\Edaphologies\Traits\EdaphologiesEvents;
//use App\Repositories\Edaphologies\Traits\EdaphologiesPresenters;
use App\Repositories\Edaphologies\Traits\EdaphologiesRelationships;
//use App\Repositories\Edaphologies\Traits\EdaphologiesScopes;
//use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Edaphology extends Model  {

    use EdaphologiesRelationships, Notifiable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'edaphologies';
    //protected $dates = ['deleted_at'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'plot_id',
        'client_id',
        'edaphology_level',
        'edaphology_lat', 
        'edaphology_lng', 
        'edaphology_name', 
        'edaphology_reference', 
        'edaphology_observations', 
        'edaphology_aggregate_stability', 
        'edaphology_coarse_elements', 
        'edaphology_sand', 
        'edaphology_silt', 
        'edaphology_clay', 
        'edaphology_texture', 
        'edaphology_ph', 
        'edaphology_electric_conductivity', 
        'edaphology_calcium_carbonate_equivalent', 
        'edaphology_active_lime', 
        'edaphology_total_organic_matter', 
        'edaphology_cation_exchange'
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