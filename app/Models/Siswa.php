<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    protected $table = 'siswas'; // Pastikan nama tabel benar
    protected $fillable = [
        'nis',
        'nm_siswa',
        'jk',
        'kelas_id',
        'jurusan_id',
        'semester_id',
        'status_siswa',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id', 'id');
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'jurusan_id', 'id');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id', 'id');
    }

    public function masalahs()
    {
        return $this->hasMany(Masalah::class, 'siswa_id', 'id');
    }

    public function presensis()
    {
        return $this->hasMany(Presensi::class, 'siswa_id', 'id');
    }
}
