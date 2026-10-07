<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeServis extends Model
{
    protected $table = 'homeservice';
    protected $primaryKey = 'id_home_service';

    public $timestamps = false;

    protected $fillable = [
        'id_pelanggan',
        'id_kendaraan',
        'id_montir',
        'alamat',
        'tanggal',
        'status',
        'catatan',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(
            Pelanggan::class,
            'id_pelanggan',
            'id_pelanggan'
        );
    }

    public function kendaraan()
    {
        return $this->belongsTo(
            Kendaraan::class,
            'id_kendaraan',
            'id_kendaraan'
        );
    }

    public function montirLapangan()
    {
        return $this->belongsTo(
            MontirLapangan::class,
            'id_montir',
            'id_montir'
        );
    }
}