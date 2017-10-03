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
    protected $fillable = [
        'id',
        'administration_app_name',
        'administration_app_version',
        'administration_app_url',
        'administration_app_owner_name',
        'administration_app_owner_address',
        'administration_app_owner_phone',
        'administration_app_owner_nif',
        'administration_app_owner_zip',
        'administration_app_owner_city',
        'administration_app_owner_region',
        'administration_app_owner_state',
        'administration_app_owner_country',
        'administration_hosting_name',
        'administration_hosting_address',
        'administration_hosting_email',
        'administration_hosting_url',
        'administration_hosting_nif',
        'administration_hosting_zip',
        'administration_hosting_phone',
        'administration_hosting_city',
        'administration_hosting_region',
        'administration_hosting_state',
        'administration_hosting_country',
        'administration_hosting_conditions_url',
        'administration_hosting_register',
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