<?php

namespace App\Repositories\Users;

use App\Repositories\Users\Traits\UsersPresenters;
use App\Repositories\Users\Traits\UsersRelationships;
use App\Repositories\Users\Traits\UsersScopes;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable, SoftDeletes, UsersPresenters, UsersRelationships, UsersScopes;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_god'    => 'boolean',
        'is_admin'  => 'boolean',
        'is_editor' => 'boolean',
        'is_user'   => 'boolean',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'agreement',
        'is_admin',
        'is_editor',
        'is_god',
        'is_user',
        'name', 
        'email', 
        'password',
        'locale',
        'client_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 
        'remember_token',
    ];

    /**
     * The Softdeletes 
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
