<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;
    protected $table = 'jurusans'; // Pastikan nama tabel benar 
    protected $fillable = [
        'kd_jurusan',
        'nm_jurusan',
    ];

    public function siswas()
    {
        return $this->hasMany(Siswa::class, 'jurusan_id', 'id');
    }
}
