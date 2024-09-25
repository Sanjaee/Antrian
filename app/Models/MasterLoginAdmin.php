<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterLoginAdmin extends Model
{
    use HasFactory;

    protected $table = 'master_login_admins';

    protected $fillable = [
        'user_id',
        'department',
    ];

    public function masterLogin()
    {
        return $this->belongsTo(MasterLogin::class, 'user_id');
    }
}
?>
