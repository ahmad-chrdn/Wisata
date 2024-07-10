<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $fillable = [
        'kd_jabatan',
        'nm_jabatan',
    ];

    public function pegawais()
    {
        return $this->hasMany(Pegawai::class, 'jabatan_id', 'id');
    }
}
