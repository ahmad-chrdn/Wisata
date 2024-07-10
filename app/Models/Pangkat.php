<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pangkat extends Model
{
    use HasFactory;
    protected $fillable = [
        'kd_pangkat',
        'nm_pangkat',
        'gol_ruang',
    ];

    public function pegawais()
    {
        return $this->hasMany(Pegawai::class, 'pangkat_id', 'id');
    }

    public function duks()
    {
        return $this->hasMany(Duk::class, 'pangkat_id', 'id');
    }
}
