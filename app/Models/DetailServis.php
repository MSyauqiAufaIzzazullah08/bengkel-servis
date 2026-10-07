<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailServis extends Model
{
    protected $table = 'DetailServis';
    protected $primaryKey = 'id_detail';

    public $timestamps = false;

    protected $fillable = [
        'booking_id',
        'layanan_id',
        'id_sparepart',
        'harga',
        'catatan',
    ];

    public function bookingServis()
    {
        return $this->belongsTo(
            BookingServis::class,
            'booking_id',
            'id_booking'
        );
    }

    public function layananServis()
    {
        return $this->belongsTo(
            LayananServis::class,
            'layanan_id',
            'id_layanan'
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