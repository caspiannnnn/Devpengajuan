<?php

namespace App\Models\Dosen;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelNilaiPembimbing extends Model
{
    use HasFactory;
    
    protected $table = 'nilai_pembimbing';
    public $timestamps = false;
    
    protected $fillable = [
        'nim',
        'pbb1',
        'pbb2',
        'nilai_pbb1',
        'nilai_pbb2',
        'rata_rata',
        'nilai_akhir',
    ];
}
