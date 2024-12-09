<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelMahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswa';
    public $timestamps = false;
    
    protected $fillable = [
        'nim',
        'nama',
        'email',
        'no_hp',
        'jenkel',
        'program_studi',
        'fakultas',
        'pas',
        'id_role',
    ];
}
