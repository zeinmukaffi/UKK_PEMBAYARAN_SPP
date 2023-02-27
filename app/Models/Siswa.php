<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswas';
    protected $guarded = [];
    
    public function spp()
    {
        return $this->belongsTo(SPP::class);
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
