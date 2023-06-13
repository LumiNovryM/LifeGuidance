<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Model;
use Laravel\Sanctum\HasApiTokens;

class Siswa extends Model
{
    use HasFactory,HasApiTokens;
    
    protected $guarded = [];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function bimbinganPribadi()
    {
        return $this->belongsToMany(Guru::class, Bimbingan_Pribadi::class);
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

    
    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
