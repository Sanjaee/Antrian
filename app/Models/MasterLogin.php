<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class MasterLogin extends Authenticatable
{
    use Notifiable;

    protected $table = 'master_logins';

    protected $fillable = [
        'username',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
    ];

    public function masterLoginAdmin()
    {
        return $this->hasOne(MasterLoginAdmin::class, 'user_id');
    }
}
