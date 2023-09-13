<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendapatanModel extends Model
{
    use HasFactory;
    protected $table = 'pendapatans';
    protected $fillable = [
        'id',
        'tanggal',
        'keterangan',
        'nominal', 
    ];

}
