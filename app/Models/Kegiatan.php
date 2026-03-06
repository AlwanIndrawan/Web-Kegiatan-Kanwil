<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    public function bidang()
{
    return $this->belongsTo(Bidang::class);
}
protected $fillable = [
    'bidang_id',
    'judul',
    'deskripsi',
    'tanggal'
];
}
