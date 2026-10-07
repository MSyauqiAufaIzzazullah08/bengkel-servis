<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teknisi extends Model
{
    protected $table = 'Teknisi';
    protected $primaryKey = 'id_teknisi';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'nama',
        'no_hp',
        'keahlian',
        'status',
    ];

    public function penugasanTeknisi()
    {
        return $this->hasMany(
            PenugasanTeknisi::class,
            'id_teknisi',
            'id_teknisi'
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