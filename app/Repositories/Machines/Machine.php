<?php 

namespace App\Repositories\Machines;

use App\Repositories\_Traits\Date;
//use App\Repositories\Machines\Traits\MachinesEvents;
use App\Repositories\Machines\Traits\MachinesPresenters;
//use App\Repositories\Machines\Traits\MachinesRelationships;
//use App\Repositories\Machines\Traits\MachinesScopes;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Machine extends Model  {

    use Date, MachinesPresenters, Notifiable, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'machines';
    protected $dates = ['deleted_at'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'equipment_id',
        'machine_equipment_name',
        'machine_brand',
        'machine_model',
        'machine_date',
        'machine_inspection',
        'machine_next_inspection',
        'machine_observations',
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