<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LemburModel extends Model
{
    use HasFactory;
    protected $table = 'lemburs';
    protected $fillable = [
        'id_pegawai',
        'absen_masuk',
        'absen_pulang',
        'status',
        'keterangan' 
    ];
}
