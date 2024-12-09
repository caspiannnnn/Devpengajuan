<?php

namespace App\Models\Mahasiswa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelFileRepo extends Model
{
    use HasFactory;

    protected $table = 'file_repo';
    public $timestamps = false;
    
    protected $fillable = [
        'nama',
        'cloud_path',
        'local_path'
    ];
}
