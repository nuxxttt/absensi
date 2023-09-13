<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GajiModel extends Model
{
    use HasFactory;
    protected $table = 'gajis';
    protected $fillable = [
        'id_pegawai',
        'jumlah',
        'status',
        'keterangan', 
    ];
}
