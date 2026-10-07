<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $table = 'OrderDetail';
    protected $primaryKey = 'id_detail_order';

    public $timestamps = false;

    protected $fillable = [
        'id_order',
        'id_sparepart',
        'jumlah',
        'harga',
    ];

    public function orderSparePart()
    {
        return $this->belongsTo(
            OrderSparePart::class,
            'id_order',
            'id_order'
        );
    }

    public function sparePart()
    {
        return $this->belongsTo(
            SparePart::class,
            'id_sparepart',
            'id_sparepart'
        );
    }
}