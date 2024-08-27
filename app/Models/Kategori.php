<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $table = 'categories'; // Pastikan nama tabel benar
    protected $fillable = [
        'nm_kategori',
        'keterangan',
    ];

    // Relasi ke tabel destinations (one-to-many)
    public function destinations()
    {
        return $this->hasMany(Destination::class);
    }
}
