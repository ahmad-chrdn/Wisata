<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masalah extends Model
{
    use HasFactory;
    protected $table = 'masalahs'; // Pastikan nama tabel benar
    protected $fillable = [
        'hari',
        'siswa_id',
        'keterangan',
        'tanggal',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }
}
