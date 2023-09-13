<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PotonganModel extends Model
{
    use HasFactory;
    protected $table = 'potongans';
    protected $fillable = [
        'nama',
        'jumlah',
        'status',
        'keterangan',
        'id_pegawai' 
    ];
}
