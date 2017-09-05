<?php 

namespace App\Repositories\Pests;

//use App\Repositories\Traits\Date;
//use App\Repositories\Pests\Traits\PestsEvents;
//use App\Repositories\Pests\Traits\PestsPresenters;
//use App\Repositories\Pests\Traits\PestsRelationships;
//use App\Repositories\Pests\Traits\PestsScopes;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pest extends Model  {

    use Notifiable, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pests';
    protected $dates = ['deleted_at'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [        
        'crop_id',
        'pest_name', 
        'pest_description'
    ];
}