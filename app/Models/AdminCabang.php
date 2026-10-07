<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminCabang extends Model
{
    protected $table = 'AdminCabang';
    protected $primaryKey = 'id_admin';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'cabang_id',
    ];

    public function cabang()
    {
        return $this->belongsTo(
            Cabang::class,
            'cabang_id',
            'id_cabang'
        );
    }

    public function user()
    {
        return $this->belongsTo(
            User::class,
            'user_id',
            'id_user'
        );
    }
}