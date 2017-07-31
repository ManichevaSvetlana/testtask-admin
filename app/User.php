<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'username', 'password', 'name', 'surname', 'dbo'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function group(){
        return $this->belongsToMany(Group::class,  'group_users', 'user_id', 'group_id' );
    }

}
