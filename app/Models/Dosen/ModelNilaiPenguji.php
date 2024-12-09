<?php

namespace App\Models\Dosen;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelNilaiPenguji extends Model
{
    use HasFactory;

    protected $table = 'nilai_penguji';
    public $timestamps = false;
    
    protected $fillable = [
        'nim',
        'penguji_1',
        'penguji_2',
        'penguji_3',
        'pemaparan_p1',
        'pemaparan_p2',
        'pemaparan_p3',
        'materi_pokok_p1',
        'materi_pokok_p2',
        'materi_pokok_p3',
        'masalah_p1',
        'masalah_p2',
        'masalah_p3',
        'jumlah_p1',
        'jumlah_p2',
        'jumlah_p3',
        'rata_rata',
        'nilai_akhir',
    ];
}
