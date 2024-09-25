<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataQueuing extends Model
{
    use HasFactory;

    protected $table = 'data_queuings';

    protected $fillable = [
        'customer_id',
        'jenis_antrian',
        'nomor_antrian',
        'status',
        'waktu_ambil',
        'waktu_panggil',
        'waktu_selesai',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function formatTimeAgo($time)
{
    return Carbon::parse($time)->diffForHumans();
}
}
?>
