<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

// use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory, Notifiable, HasApiTokens;
    
    protected $guarded = [];

    protected $table = 'gurus';


    
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

    public function kelas()
    {
        return $this->belongsToMany(Kelas::class, GuruKelas::class);
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
