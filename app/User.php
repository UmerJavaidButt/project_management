<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\CanResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    const ADMIN_TYPE = 'admin';
    const DEFAULT_TYPE = 'default';
    const AGENT_TYPE = 'agent';

    public function isAdmin()    {        
        if ($this->type=="admin"){
            return true;
       } else 
       {
            return false;
       }
    }

    public function isAgent()    {        
        if ($this->type=="agent"){
            return true;
       } else 
       {
            return false;
       }
    }
}