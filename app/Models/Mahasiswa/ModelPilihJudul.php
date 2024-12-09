<?php

namespace App\Models\Mahasiswa;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelPilihJudul extends Model
{
    use HasFactory;

    protected $table = 'proposal';
    public $timestamps = false;
    
    protected $fillable = [
        'id_judul',
        'nim',
        'id_repo',
        'approve_by',
        'waktu_pengajuan',
        'status',
    ];
}
