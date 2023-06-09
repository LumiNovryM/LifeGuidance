<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bimbingan_Pribadi extends Model
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
}
