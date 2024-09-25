<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'no_polisi',
        'nama',
        'alamat',
        'no_hp',
    ];

    public function dataQueuing()
    {
        return $this->hasMany(DataQueuing::class, 'customer_id');
    }
}
?>
