<?php 

namespace App\Repositories\Workers;

use App\Repositories\_Traits\Date;
//use App\Repositories\Workers\Traits\WorkersEvents;
use App\Repositories\Workers\Traits\WorkersPresenters;
use App\Repositories\Workers\Traits\WorkersRelationships;
//use App\Repositories\Workers\Traits\WorkersScopes;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Worker extends Model  {

    use Date, Notifiable, SoftDeletes, WorkersPresenters, WorkersRelationships;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'workers';
    protected $dates = ['deleted_at'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'client_id',
        'user_id',
        'worker_name',
        'worker_nif',
        'worker_start',
        'worker_ropo',
        'worker_ropo_date',
        'worker_ropo_level',
        'worker_observations'
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