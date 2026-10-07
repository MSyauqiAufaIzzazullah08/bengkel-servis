<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $table = 'Promo';
    protected $primaryKey = 'id_promo';

    public $timestamps = false;

    protected $fillable = [
        'kode_promo',
        'jenis_diskon',
        'nilai_diskon',
        'minimal_transaksi',
        'periode_mulai',
        'periode_selesai',
        'kuota',
    ];

    public function pembayarans()
    {
        return $this->hasMany(
            Pembayaran::class,
            'id_promo',
            'id_promo'
        );
    }
}