<?php 

namespace App\Repositories\AgronomicCulturals;

use App\Repositories\_Traits\Date;
//use App\Repositories\AgronomicCulturals\Traits\AgronomicCulturalsEvents;
use App\Repositories\AgronomicCulturals\Traits\AgronomicCulturalsPresenters;
use App\Repositories\AgronomicCulturals\Traits\AgronomicCulturalsRelationships;
//use App\Repositories\AgronomicCulturals\Traits\AgronomicCulturalsScopes;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class AgronomicCultural extends Model  {

    use AgronomicCulturalsPresenters, AgronomicCulturalsRelationships, Date, Notifiable, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'agronomic_culturals';
    protected $dates = ['deleted_at'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'client_id',
        'plot_id',
        'crop_id',
        'agronomic_date',
        // 'agronomic_quantity',
        // 'agronomic_quantity_unit',
        'agronomic_observations',
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