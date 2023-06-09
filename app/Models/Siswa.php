<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Model;

class Siswa extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function bimbinganPribadi()
    {
        return $this->hasMany(Bimbingan_Pribadi::class);
    }
}
