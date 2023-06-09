<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;
// use Illuminate\Database\Eloquent\Model;

class Walas extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    
    public function walas()
    {
        return $this->hasOne(Kelas::class);
    }
    public function bimbinganPribadi()
    {
        return $this->belongsToMany(Siswa::class, Bimbingan_Pribadi::class);
    }
}
