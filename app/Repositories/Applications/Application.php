<?php 

namespace App\Repositories\Applications;

//use App\Repositories\_Traits\Date;
//use App\Repositories\Applications\Traits\ApplicationsEvents;
//use App\Repositories\Applications\Traits\ApplicationsPresenters;
//use App\Repositories\Applications\Traits\ApplicationsRelationships;
//use App\Repositories\Applications\Traits\ApplicationsScopes;
//use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Application extends Model  {

    use Notifiable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'applications';
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