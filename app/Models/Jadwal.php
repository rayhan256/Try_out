<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $keyType = 'string';
    function dosen() {
        return $this->belongsTo(Dosen::class);
    }

    function ruangan() {
        return $this->belongsTo(Ruangan::class);
    }

    function matkul() {
        return $this->belongsTo(MataKuliah::class, 'mata_kuliah_id');
    }
}
