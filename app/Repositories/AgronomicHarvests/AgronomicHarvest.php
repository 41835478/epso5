<?php 

namespace App\Repositories\AgronomicHarvests;

use App\Repositories\_Traits\Date;
//use App\Repositories\AgronomicHarvests\Traits\AgronomicHarvestsEvents;
use App\Repositories\AgronomicHarvests\Traits\AgronomicHarvestsPresenters;
use App\Repositories\AgronomicHarvests\Traits\AgronomicHarvestsRelationships;
//use App\Repositories\AgronomicHarvests\Traits\AgronomicHarvestsScopes;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class AgronomicHarvest extends Model  {

    use AgronomicHarvestsPresenters, AgronomicHarvestsRelationships, Date, Notifiable, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'agronomic_harvests';
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
        'agronomic_quantity',
        'agronomic_quantity_unit',
        'agronomic_quantity_ha',
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