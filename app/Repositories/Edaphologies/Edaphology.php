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
    protected $fillable = ['id'];

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