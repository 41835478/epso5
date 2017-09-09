<?php 

namespace App\Repositories\Configs;

//use App\Repositories\Traits\Date;
//use App\Repositories\Configs\Traits\ConfigsEvents;
//use App\Repositories\Configs\Traits\ConfigsPresenters;
//use App\Repositories\Configs\Traits\ConfigsRelationships;
//use App\Repositories\Configs\Traits\ConfigsScopes;
//use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Config extends Model  {

    use Notifiable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'configs';
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