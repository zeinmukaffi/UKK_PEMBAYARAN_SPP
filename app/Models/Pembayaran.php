<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $guarded = [];
    public function spp()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function petugas()
    {
        return $this->belongsTo(Petugas::class);
    }
}
