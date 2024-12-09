<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelDosen extends Model
{
    use HasFactory;

    protected $table = 'dosen';
    public $timestamps = false;
    
    protected $fillable = [
        'no_induk',
        'nama_dosen',
        'jurusan',
        'fakultas',
        'email',
        'id_role',
    ];
}
