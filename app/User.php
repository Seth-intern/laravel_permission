<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/*
 * Spatie
 */
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable;

    // Spatie Laravel permission
    /*
     * If we doesn't add this package, you won't be able to use Spatie like (
     * ->permission, ->getAllPermissions(), ->getDirectPermissions(), ->getPermissionsViaRoles(),
     * etc... )
     **/
    use HasRoles;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
     * Mutator to auto encrypt password
     */
    public function setPasswordAttribute($password){
        $this->attributes['password'] = bcrypt($password);
    }
}
