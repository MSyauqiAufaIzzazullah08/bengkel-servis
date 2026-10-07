<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'Role';
    protected $primaryKey = 'id_role';

    public $timestamps = false;

    protected $fillable = [
        'nama_role',
        'deskripsi',
    ];

    public function users()
    {
        return $this->hasMany(
            User::class,
            'role_id',
            'id_role'
        );
    }
}