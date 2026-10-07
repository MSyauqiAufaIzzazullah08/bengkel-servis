<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OperasionalCabang extends Model
{
    protected $table = 'OperasionalCabang';
    protected $primaryKey = 'id_operasional';

    public $timestamps = false;

    protected $fillable = [
        'cabang_id',
        'total_booking',
        'total_transaksi',
        'pendapatan',
        'stok',
        'laporan',
    ];

    public function cabang()
    {
        return $this->belongsTo(
            Cabang::class,
            'cabang_id',
            'id_cabang'
        );
    }
}