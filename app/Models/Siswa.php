<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = [
        'nama',
        'nis',
        'nisn',
        'kelas_id',
        'alamat',
        'no_telp',
        'spp_id',
    ];

   public function spp()
   {
    return $this->belongsTo(Spp::class);
   }

   public function kelas()
   {
    return $this->belongsTo(Kelas::class);
   }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }
}
