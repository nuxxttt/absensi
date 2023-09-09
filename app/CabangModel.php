<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CabangModel extends Model
{
    use HasFactory;
    protected $table = 'cabangs';
    protected $fillable = [
        "nama",
        'lokasi',
        'keterangan',
        'mesin_absen',
        'keterangan',
        'status'
    ];
}
