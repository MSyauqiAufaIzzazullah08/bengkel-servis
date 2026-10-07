<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SparePart extends Model
{
    protected $table = 'SparePart';
    protected $primaryKey = 'id_sparepart';

    public $timestamps = false;

    protected $fillable = [
        'kategori_id',
        'nama',
        'harga',
        'stok',
        'deskripsi',
        'gambar',
    ];

    public function kategori()
    {
        return $this->belongsTo(
            KategoriSparePart::class,
            'kategori_id',
            'id_kategori'
        );
    }

    public function orderDetail()
    {
        return $this->hasMany(
            OrderDetail::class,
            'id_sparepart',
            'id_sparepart'
        );
    }
}