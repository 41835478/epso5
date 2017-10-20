<?php 

namespace App\Repositories\AgronomicBiocides;

use App\Repositories\_Traits\Date;
//use App\Repositories\AgronomicBiocides\Traits\AgronomicBiocidesEvents;
use App\Repositories\AgronomicBiocides\Traits\AgronomicBiocidesPresenters;
use App\Repositories\AgronomicBiocides\Traits\AgronomicBiocidesRelationships;
//use App\Repositories\AgronomicBiocides\Traits\AgronomicBiocidesScopes;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class AgronomicBiocide extends Model  {

    use AgronomicBiocidesPresenters, AgronomicBiocidesRelationships, Date, Notifiable, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'agronomic_biocides';
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
        'biocide_id',
        'worker_id',
        'agronomic_date',
        'agronomic_quantity',
        'agronomic_quantity_unit',
        'agronomic_biocide_secure',
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