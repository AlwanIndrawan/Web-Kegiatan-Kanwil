<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // <-- tambahkan ini
use Illuminate\Database\Eloquent\Model;

class Bidang extends Model
{
    use HasFactory;

    protected $fillable = ['nama'];

     public function kegiatans()
    {
        return $this->hasMany(Kegiatan::class);
    }
}

