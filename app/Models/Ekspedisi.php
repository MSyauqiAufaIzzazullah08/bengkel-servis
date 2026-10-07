<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ekspedisi extends Model
{
    protected $table = 'Ekspedisi';
    protected $primaryKey = 'id_ekspedisi';

    public $timestamps = false;

    protected $fillable = [
        'nama_ekspedisi',
        'kontak',
    ];

    public function pengiriman()
    {
        return $this->hasMany(
            Pengiriman::class,
            'id_ekspedisi',
            'id_ekspedisi'
        );
    }
}