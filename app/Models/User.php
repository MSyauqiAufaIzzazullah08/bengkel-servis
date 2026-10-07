<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'User';
    protected $primaryKey = 'id_user';

    public $timestamps = false;

    protected $fillable = [
        'nama',
        'email',
        'password',
        'no_hp',
        'alamat',
        'role_id',
        'cabang_id',
        'status',
    ];

    protected $hidden = [
        'password',
    ];

    public function role()
    {
        return $this->belongsTo(
            Role::class,
            'role_id',
            'id_role'
        );
    }

    public function adminCabang()
    {
        return $this->hasOne(
            AdminCabang::class,
            'user_id',
            'id_user'
        );
    }

    public function teknisi()
    {
        return $this->hasOne(
            Teknisi::class,
            'user_id',
            'id_user'
        );
    }

    public function montirLapangan()
    {
        return $this->hasOne(
            MontirLapangan::class,
            'user_id',
            'id_user'
        );
    }

    public function cabang()
    {
        return $this->belongsTo(
            Cabang::class,
            'cabang_id',
            'id_cabang'
        );
    }
}