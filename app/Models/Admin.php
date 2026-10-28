<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $table = 'tb_admin';
    
    protected $fillable = [
        'username',
        'password',
        'naran_kompletu',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}