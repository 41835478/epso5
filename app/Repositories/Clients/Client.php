<?php 

namespace App\Repositories\Clients;

//use App\Repositories\Traits\Date;
//use App\Repositories\Clients\Traits\ClientsEvents;
//use App\Repositories\Clients\Traits\ClientsPresenters;
use App\Repositories\Clients\Traits\ClientsRelationships;
//use App\Repositories\Clients\Traits\ClientsScopes;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Client extends Model  {

    use ClientsRelationships, Notifiable, SoftDeletes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'clients';
    protected $dates = ['deleted_at'];

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_address', 
        'client_city', 
        'client_contact', 
        'client_country', 
        'client_email',
        'client_image',
        'client_name',
        'client_nif',
        'client_region', 
        'client_state',
        'client_telephone', 
        'client_web',
        'client_zip', 
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
    //     'client_json_configuration'     => 'json',
    //     'client_json_crops'             => 'json',
    //     'client_json_permission'        => 'json',
    //     'client_json_regions'           => 'json',
    // ]; 
}