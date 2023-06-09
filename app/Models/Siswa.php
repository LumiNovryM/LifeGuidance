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
}
