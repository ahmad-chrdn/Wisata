<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    use HasFactory;
    protected $table = 'semesters'; // Pastikan nama tabel benar 
    protected $fillable = [
        'semester',
        'thn_ajaran',
        'status',
    ];

    public function siswas()
    {
        return $this->hasMany(Siswa::class, 'semester_id', 'id');
    }
}
