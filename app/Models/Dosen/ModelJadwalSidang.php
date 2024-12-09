<?php

namespace App\Models\Dosen;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelJadwalSidang extends Model
{
    use HasFactory;

    protected $table = 'jadwal_ta';
    public $timestamps = false;
    
    protected $fillable = [
        'id_sidang',
        'nim',
        'penguji_1',
        'penguji_2',
        'datetime',
        'jam',
        'link_zoom',
    ];
}
