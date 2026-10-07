<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MetodePembayaran extends Model
{
    protected $table = 'MetodePembayaran';
    protected $primaryKey = 'id_metode';

    public $timestamps = false;

    protected $fillable = [
        'nama_metode',
        'deskripsi',
    ];

    public function pembayarans()
    {
        return $this->hasMany(
            Pembayaran::class,
            'metode_pembayaran_id',
            'id_metode'
        );
    }
}