<?php

namespace Crazyboy\Leave\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'name', 'email', 'password', 'firstname', 'middlename', 'lastname', 'dob', 'gender', 'maritalstatus', 'address', 'image', 'contact', 'bloodgroup', 'reportto', 'state', 'city', 'leavebalance', 'unpaidleaves', 'country',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
