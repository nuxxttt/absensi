<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KaryawanModel extends Model
{
    use HasFactory;
    protected $table = 'karyawans';
    protected $fillable = [
        'nama',
        'id_cabang',
        'jabatan',
        'id_shift',
        'id_absen'
    ];
}
