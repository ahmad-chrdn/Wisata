<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelass'; // Pastikan nama tabel benar
    protected $fillable = [
        'kd_kelas',
        'nm_kelas',
    ];

    public function siswas()
    {
        return $this->hasMany(Siswa::class, 'kelas_id', 'id');
    }
}
