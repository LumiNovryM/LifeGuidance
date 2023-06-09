<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bimbingan_Sosial extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
    
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function walas()
    {
        return $this->belongsTo(Walas::class);
    }
    public function diajukan()
    {
        return $this->belongsTo(Siswa::class);
    }
}
