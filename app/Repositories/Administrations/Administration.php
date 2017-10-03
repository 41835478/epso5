<?php 

namespace App\Repositories\Administrations;

//use App\Repositories\_Traits\Date;
//use App\Repositories\Administrations\Traits\AdministrationsEvents;
//use App\Repositories\Administrations\Traits\AdministrationsPresenters;
//use App\Repositories\Administrations\Traits\AdministrationsRelationships;
//use App\Repositories\Administrations\Traits\AdministrationsScopes;
//use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Administration extends Model  {

    use Notifiable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'administrations';
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