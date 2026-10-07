<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    protected $table = 'Pengiriman';
    protected $primaryKey = 'id_pengiriman';

    public $timestamps = false;

    protected $fillable = [
        'id_order',
        'id_ekspedisi',
        'kurir',
        'no_resi',
        'status',
        'estimasi_tiba',
        'tanggal_kirim',
    ];

    public function orderSparePart()
    {
        return $this->belongsTo(
            OrderSparePart::class,
            'id_order',
            'id_order'
        );
    }

    public function ekspedisi()
    {
        return $this->belongsTo(
            Ekspedisi::class,
            'id_ekspedisi',
            'id_ekspedisi'
        );
    }
}