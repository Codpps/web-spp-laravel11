<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $fillable = [
        'user_id',
        'siswa_id',
        'spp_id',
        'jumlah_bayar',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function spp()
    {
        return $this->belongsTo(Spp::class);
    }
}
