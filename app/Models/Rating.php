<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'Rating';
    protected $primaryKey = 'id_rating';

    public $timestamps = false;

    protected $fillable = [
        'id_pelanggan',
        'id_booking',
        'id_order',
        'nilai',
        'ulasan',
        'tanggal',
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
        return $this->belongsTo(
            BookingServis::class,
            'id_booking',
            'id_booking'
        );
    }

    public function orderSparePart()
    {
        return $this->belongsTo(
            OrderSparePart::class,
            'id_order',
            'id_order'
        );
    }
}