<?php 

namespace App\Repositories\Patterns;

//use App\Repositories\Traits\Date;
//use App\Repositories\Patterns\Traits\PatternsEvents;
//use App\Repositories\Patterns\Traits\PatternsPresenters;
//use App\Repositories\Patterns\Traits\PatternsRelationships;
//use App\Repositories\Patterns\Traits\PatternsScopes;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Pattern extends Model  {

    use Notifiable, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'patterns';
    protected $dates = ['deleted_at'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [        
        'crop_id',
        'pattern_name', 
        'pattern_reference'
    ];
}