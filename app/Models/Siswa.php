<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;

    protected $fillable = ['kelas_id', 'nama', 'nis']; // Tambahkan ini

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
