<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ruangan extends Model
{
    use HasFactory;
    protected $fillable = ['mata_kuliah_id', 'dosen_id', 'ruangan_id', 'tanggal', 'jam_mulai', 'jam_selesai'];
    function jadwal() {
        return $this->hasOne(Jadwal::class);
    }
}
