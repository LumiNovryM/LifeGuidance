<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Model;
// use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    protected $table = 'gurus';


    
    public function bimbinganPribadi()
    {
        return $this->hasMany(Bimbingan_Pribadi::class);
    }

    public function kelas()
    {
        return $this->belongsToMany(Kelas::class, GuruKelas::class);
    }

}
