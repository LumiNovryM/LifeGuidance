<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function walas()
    {
        return $this->hasOne(Walas::class);
    }

    public function siswa()
    {
        return $this->hasMany(Siswa::class);
    }

    public function guru()
    {
        return $this->belongsToMany(Guru::class, GuruKelas::class);
    }

    public function bimbinganPribadi()
    {
        return $this->belongsToMany(Siswa::class, Bimbingan_Pribadi::class);
    }

    public function bimbinganBelajar()
    {
        return $this->belongsToMany(Siswa::class, Bimbingan_Belajar::class);
    }

    public function bimbinganSosial()
    {
        return $this->belongsToMany(Siswa::class, Bimbingan_Sosial::class);
    }

    public function bimbinganKarir()
    {
        return $this->belongsToMany(Siswa::class, Bimbingan_Sosial::class);
    }

    public function petaKerawanan()
    {
        return $this->belongsToMany(Siswa::class, Peta_Kerawanan::class);
    }
}
