<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;
    protected $table = 'presensis'; // Pastikan nama tabel benar
    protected $fillable = [
        'hari',
        'siswa_id',
        'status_presensi',
        'waktu_presensi',
        'user_id',
    ];

    protected $casts = [
        'waktu_presensi' => 'datetime',
    ];

    // Relasi ke model Siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }

    // Relasi ke model User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
