<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MontirLapangan extends Model
{
    protected $table = 'MontirLapangan';
    protected $primaryKey = 'id_montir';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'nama',
        'no_hp',
        'area_tugas',
        'status',
    ];

    public function homeServis()
    {
        return $this->hasMany(
            HomeServis::class,
            'id_montir',
            'id_montir'
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