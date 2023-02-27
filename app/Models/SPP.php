<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SPP extends Model
{
    protected $table = 'spp';
    protected $guarded = [];

    public function siswaSPP()
    {
        return $this->hasManyThrough(Siswa::class, Pembayaran::class, 'spp_id', 'siswa_id');
    }
}
