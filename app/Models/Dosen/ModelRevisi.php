<?php

namespace App\Models\Dosen;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelRevisi extends Model
{
    use HasFactory;

    protected $table = 'revisi_proposal';
    public $timestamps = false;
    
    protected $fillable = [
        'revisi_text',
        'revisi_ke',
        'status_revisi',
        'nim',
        'revisi_by',
        'id_repo',
    ];
}
