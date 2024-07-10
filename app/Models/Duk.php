<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Duk extends Model
{
    use HasFactory;
    protected $fillable = [
        'pegawai_id',
        'pangkat_id',
        'pangkatYad_tmt',
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id', 'id');
    }

    public function pangkat()
    {
        return $this->belongsTo(Pangkat::class, 'pangkat_id', 'id');
    }
}
