<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriSparePart extends Model
{
    protected $table = 'KategoriSparePart';
    protected $primaryKey = 'id_kategori';

    public $timestamps = false;

    protected $fillable = [
        'nama_kategori',
        'deskripsi',
    ];

    public function sparePart()
    {
        return $this->hasMany(
            SparePart::class,
            'kategori_id',
            'id_kategori'
        );
    }
}