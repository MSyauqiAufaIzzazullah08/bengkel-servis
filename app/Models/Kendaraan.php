<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    protected $table = 'Kendaraan';
    protected $primaryKey = 'id_kendaraan';

    public $timestamps = false;

    protected $fillable = [
        'id_pelanggan',
        'merk',
        'model',
        'tahun',
        'nopol',
    ];

    public function pelanggan()
    {
        return $this->belongsTo(
            Pelanggan::class,
            'id_pelanggan',
            'id_pelanggan'
        );
    }

    public function bookingServis()
    {
        return $this->hasMany(
            BookingServis::class,
            'id_kendaraan',
            'id_kendaraan'
        );
    }

    public function homeServis()
    {
        return $this->hasMany(
            HomeServis::class,
            'id_kendaraan',
            'id_kendaraan'
        );
    }
}