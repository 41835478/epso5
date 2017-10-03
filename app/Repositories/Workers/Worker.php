<?php 

namespace App\Repositories\Workers;

//use App\Repositories\_Traits\Date;
//use App\Repositories\Workers\Traits\WorkersEvents;
//use App\Repositories\Workers\Traits\WorkersPresenters;
//use App\Repositories\Workers\Traits\WorkersRelationships;
//use App\Repositories\Workers\Traits\WorkersScopes;
//use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Worker extends Model  {

    use Notifiable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'workers';
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