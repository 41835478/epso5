<?php 

namespace App\Repositories\AgronomicPests;

use App\Repositories\_Traits\Date;
//use App\Repositories\AgronomicPests\Traits\AgronomicPestsEvents;
use App\Repositories\AgronomicPests\Traits\AgronomicPestsPresenters;
use App\Repositories\AgronomicPests\Traits\AgronomicPestsRelationships;
//use App\Repositories\AgronomicPests\Traits\AgronomicPestsScopes;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class AgronomicPest extends Model  {

    use AgronomicPestsPresenters, AgronomicPestsRelationships, Date, Notifiable, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'agronomic_pests';
    protected $dates = ['deleted_at'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id'
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