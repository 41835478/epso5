<?php

namespace App\Repositories\Profiles;

use App\Repositories\Profiles\Traits\ProfilesEvents;
use App\Repositories\Profiles\Traits\ProfilesPresenters;
use App\Repositories\Profiles\Traits\ProfilesRelationships;
use App\Repositories\Profiles\Traits\ProfilesScopes;
use App\Repositories\_Traits\Date;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Profile extends Authenticatable
{
    use Date, Notifiable, ProfilesPresenters, ProfilesRelationships, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'stored_file',
        'profile_address',
        'profile_birthdate',
        'profile_city',
        'profile_region',
        'profile_social_facebook',
        'profile_social_google',
        'profile_social_linkedin',
        'profile_social_twitter',
        'profile_state',
        'profile_telephone',
        'profile_url',
        'profile_zip',
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_admin' => 'boolean',
        'is_editor' => 'boolean',
        'is_god' => 'boolean',
        'is_user' => 'boolean',
    ];

    /**
     * The softdeletes attribute
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
}
