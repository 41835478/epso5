<?php

namespace App\Repositories\Clients;

use App\Repositories\Clients\Traits\ClientsEvents;
use App\Repositories\Clients\Traits\ClientsPresenters;
use App\Repositories\Clients\Traits\ClientsRelationships;
use App\Repositories\Clients\Traits\ClientsScopes;
use App\Repositories\_Traits\Date;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Client extends Authenticatable
{
    use Date, Notifiable, ClientsPresenters, ClientsRelationships;

    /**
     * The attributes that are mass assignable.
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
        'client_json_configuration',
        'client_json_crops',
        'client_json_permission',
        'client_json_regions',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    // protected $hidden = [
    //     'password', 
    //     'remember_token',
    // ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'client_json_configuration'     => 'json',
        'client_json_crops'             => 'json',
        'client_json_permission'        => 'json',
        'client_json_regions'           => 'json',
    ]; 
}
