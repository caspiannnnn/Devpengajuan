<?php

namespace App\Models\Dosen;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class ModelInputJudul extends Model
{
    use HasFactory;

    protected $table = 'judul_ta';
    public $timestamps = false;
    
    protected $fillable = [
        'pbb1',
        'pbb2',
        'judul',
        'kuota',
        'aktif',
        'id_dosen',
    ];
}
