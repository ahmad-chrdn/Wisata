<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $fillable = [
        'nip',
        'nm_pegawai',
        'jk',
        'tempat_lahir',
        'tgl_lahir',
        'agama',
        'pendidikan',
        'keterangan',
        'pangkat_id',
        'pangkat_tmt',
        'jabatan_id',
        'jabatan_tmt',
    ];

    public function pangkat()
    {
        return $this->belongsTo(Pangkat::class, 'pangkat_id', 'id');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id', 'id');
    }

    public function duks()
    {
        return $this->hasOne(Duk::class, 'pegawai_id', 'id');
    }
}
