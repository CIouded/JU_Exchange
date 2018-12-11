<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = "users";
    public $primaryKey = 'id';


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

    //Sets many to many relationship between User and Role
    public function roles() {
        return $this->belongsToMany(Role::class);
    }

    //Method for checking roles, will be called in controllers where different roles will be given specific access
    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) || abort(401, "User can't perform this actions");
        }
            return $this->hasRole($roles) || abort(401, "User can't perform this actions");
    }

    //Check multiple roles

    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('title', $roles)->first();
    }
  
    //Check one role
 
    public function hasRole($role)
    {
        return null !== $this->roles()->where('title', $role)->first();
    }

}
